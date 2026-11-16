<?php

namespace App\Http\Controllers;

use App\Models\ParkingArea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        $request->validate([
            'author_name' => 'required',
            'body' => 'required|max:500',
        ]);

        $area = ParkingArea::where('slug', $slug)->firstOrFail();

        $area->comments()->create([
            'user_id' => auth()->id(),
            'author_name' => $request->author_name,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }
}
