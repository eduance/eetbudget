<?php

use App\Http\Controllers\DashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/u/{token}', function ($token) {
    $user = User::where('token', $token)->firstOrFail();
    session(['user_id' => $user->id]);

    return $user->setup_complete ? redirect('/dashboard') : redirect('/intake');
})->name('login.token');

Route::post('/access', function (Illuminate\Http\Request $request) {
    $token = strtolower($request->token);

    $user = \App\Models\User::firstOrCreate(
        ['token' => $token],
        ['name' => ucfirst($token), 'weekly_budget' => 0, 'setup_complete' => false]
    );

    session(['user_id' => $user->id]);

    return $user->setup_complete
        ? redirect('/dashboard')
        : redirect('/intake');
})->name('access');

// Alles wat inlog-sessie nodig heeft
Route::middleware([App\Http\Middleware\CheckUserSession::class])->group(function () {

    // 1. De Intake
    Route::get('/intake', [DashboardController::class, 'intake'])->name('intake');
    Route::post('/intake', [DashboardController::class, 'storeIntake'])->name('intake.store');

    // 2. De Wacht-animatie (Statische view)
    Route::get('/calculating', function () {
        return view('calculating');
    })->name('calculating');

    // 3. De Uitleg (Onboarding met BMR/TDEE data)
    Route::get('/onboarding', [DashboardController::class, 'showOnboarding'])->name('onboarding');

    // 4. Het Dashboard & Acties
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/entries', [DashboardController::class, 'storeEntry'])->name('entries.store');
    Route::post('/weights', [DashboardController::class, 'storeWeight'])->name('weights.store');
});

// Admin gedeelte
Route::get('/admin/{password}', function ($password) {
    if ($password !== 'jouw-geheime-code') abort(404);

    $pendingUsers = \App\Models\User::where('weekly_budget', 0)->get();
    $activeUsers = \App\Models\User::where('weekly_budget', '>', 0)->get();

    return view('admin', compact('pendingUsers', 'activeUsers'));
});

Route::post('/admin/activate/{user}', function (\App\Models\User $user, Illuminate\Http\Request $request) {
    $user->update([
        'weekly_budget' => $request->budget,
        'setup_complete' => true
    ]);
    return back()->with('success', "{$user->name} is geactiveerd op {$request->budget} punten!");
})->name('admin.activate');
