<?php

namespace App\Http\Controllers;

use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('home.index', compact('rooms'));
    }
}
