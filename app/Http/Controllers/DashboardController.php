<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Entry;
use App\Models\Weight;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private function getUser()
    {
        // Fail-safe voor als de sessie verloopt
        if (!session()->has('user_id')) {
            return redirect('/')->send();
        }
        return User::findOrFail(session('user_id'));
    }

    public function intake()
    {
        return view('intake');
    }

    public function storeIntake(Request $request)
    {
        $user = $this->getUser();
        $age = 50;

        // 1. BMR berekenen (Rustverbruik)
        $bmr = (10 * $request->start_weight) + (6.25 * $request->height) - (5 * $age) + 5;

        // 2. TDEE berekenen (1.2 multiplier voor weinig beweging/ziektewet)
        $tdee = $bmr * 1.2;

        // 3. Afvaltarget (500 kcal tekort per dag)
        $target_kcal = $tdee - 500;

        // 4. Weekbudget berekenen (kcal naar punten: / 100)
        $weekly_budget = round(($target_kcal * 7) / 100);

        // 5. Dagpunten voor de weergave in de onboarding (1 decimaal voor precisie)
        $daily_points = number_format($weekly_budget / 7, 1);

        $user->update([
            'start_weight' => $request->start_weight,
            'height' => $request->height,
            'setup_complete' => true,
            'weekly_budget' => $weekly_budget,
        ]);

        // Data opslaan in sessie voor de onboarding
        session(['calculated_data' => [
            'bmr' => round($bmr),
            'tdee' => round($tdee),
            'target_kcal' => round($target_kcal),
            'daily_points' => $daily_points,
            'weekly_points' => $weekly_budget,
            'weight' => $request->start_weight
        ]]);

        return view('calculating');
    }

    public function showOnboarding() {
        $data = session('calculated_data');
        if (!$data) return redirect('/dashboard');

        return view('onboarding', $data);
    }

    public function index()
    {
        $user = $this->getUser();

        $daily_allowance = $user->weekly_budget / 7;

        $spent_today = $user->entries()->whereDate('created_at', now())->sum('points');
        $spent_this_week = $user->entries()->where('created_at', '>=', now()->startOfWeek())->sum('points');

        return view('dashboard', [
            'daily_balance' => round($daily_allowance - $spent_today),
            'weekly_balance' => round($user->weekly_budget - $spent_this_week),
            'reset_day' => 'maandag',
            'last_weight' => $user->weights()->latest()->first()?->weight ?? $user->start_weight
        ]);
    }

    public function storeEntry(Request $request)
    {
        Entry::create([
            'user_id' => session('user_id'),
            'points' => $request->points
        ]);
        return back();
    }

    public function storeWeight(Request $request)
    {
        Weight::create([
            'user_id' => session('user_id'),
            'weight' => $request->weight
        ]);
        return back();
    }
}
