<?php

namespace App\Http\Controllers;

use App\Models\ParkingArea;

class MapController extends Controller
{
    public function index()
    {
        $areas = ParkingArea::all();

        return view('peta', compact('areas'));
    }
}
