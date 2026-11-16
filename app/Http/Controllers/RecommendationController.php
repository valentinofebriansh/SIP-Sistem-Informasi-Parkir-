<?php

namespace App\Http\Controllers;

use App\Models\ParkingArea;

class RecommendationController extends Controller
{
    public function index()
    {
        $areas = ParkingArea::where('available_slots', '>', 0)
            ->orderBy('available_slots', 'desc')
            ->get();

        return view('rekomendasi', compact('areas'));
    }
}
