<?php

namespace App\Http\Controllers;

use App\Models\ParkingArea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = ParkingArea::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $areas = $query->get();

        return view('home', compact('areas'));
    }
}
