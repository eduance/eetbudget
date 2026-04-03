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
        return User::findOrFail(session('user_id'));
    }

    public function intake()
    {
        return view('intake');
    }

    public function storeIntake(Request $request)
    {
        $user = $this->getUser();
        $user->update([
            'start_weight' => $request->start_weight,
            'target_weight' => $request->target_weight,
            'height' => $request->height,
            'setup_complete' => true,
            'weekly_budget' => 35, // De standaard startwaarde
        ]);

        return view('calculating');
    }

    public function index() {
        $user = User::findOrFail(session('user_id'));

        $spent = $user->entries()
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('points');

        $balance = $user->weekly_budget - $spent;

        $reset_day = "maandag";
        $last_weight = $user->weights()->latest()->first()?->weight;

        return view('dashboard', compact('balance', 'reset_day', 'last_weight'));
    }

    public function storeEntry(Request $request)
    {
        Entry::create([
            'user_id' => session('user_id'),
            'points' => $request->points
        ]);
        return back()->with('success', 'Opgeslagen!');
    }

    public function storeWeight(Request $request)
    {
        Weight::create([
            'user_id' => session('user_id'),
            'weight' => $request->weight
        ]);
        return back()->with('success', 'Gewicht genoteerd!');
    }
}
