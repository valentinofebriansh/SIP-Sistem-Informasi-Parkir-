<?php

namespace App\Http\Controllers;

use App\Models\ParkingArea;

class AreaController extends Controller
{
    public function show($slug)
    {
        $area = ParkingArea::where('slug', $slug)
            ->with(['subSections.slots', 'comments'])
            ->firstOrFail();

        return view('area.show', compact('area'));
    }
}
