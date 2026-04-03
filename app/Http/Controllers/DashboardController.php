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

        // De formules
        $bmr = round((10 * $request->start_weight) + (6.25 * $request->height) - (5 * $age) + 5);
        $tdee = round($bmr * 1.35);
        $target_kcal = $tdee - 500;
        $daily_points = round($target_kcal / 100);
        $weekly_budget = $daily_points * 7;

        $user->update([
            'start_weight' => $request->start_weight,
            'target_weight' => $request->target_weight,
            'height' => $request->height,
            'setup_complete' => true,
            'weekly_budget' => $weekly_budget,
        ]);

        // We slaan de berekening even op in de sessie voor het intro-scherm
        session(['calculated_data' => [
            'bmr' => $bmr,
            'tdee' => $tdee,
            'target_kcal' => $target_kcal,
            'daily_points' => $daily_points,
            'weekly_points' => $weekly_budget
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

        // 1. Wat is zijn dagelijkse budget? (Bijv. 140 / 7 = 20)
        $daily_allowance = $user->weekly_budget / 7;

        // 2. Wat heeft hij VANDAAG uitgegeven?
        $spent_today = $user->entries()
            ->whereDate('created_at', now())
            ->sum('points');

        // 3. Wat heeft hij DEZE WEEK uitgegeven?
        $spent_this_week = $user->entries()
            ->where('created_at', '>=', now()->startOfWeek())
            ->sum('points');

        // Berekeningen
        $daily_balance = round($daily_allowance - $spent_today);
        $weekly_balance = round($user->weekly_budget - $spent_this_week);

        // De ontbrekende variabelen voor de view
        $reset_day = "maandag";
        $last_weight = $user->weights()->latest()->first()?->weight ?? $user->start_weight;

        return view('dashboard', [
            'daily_balance'  => $daily_balance,
            'weekly_balance' => $weekly_balance,
            'reset_day'      => $reset_day,
            'last_weight'    => $last_weight
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
