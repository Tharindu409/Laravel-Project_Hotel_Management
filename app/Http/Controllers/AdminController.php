<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth; // Fixed uppercase "Support"
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('home.index');
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }

        return redirect()->route('login');
    }

    public function home()
    {
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

   public function add_room(Request $request)
{
    // Validate that either price or price_per_night is present
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'nullable|numeric',
        'price_per_night' => 'nullable|numeric',
    ]);

    $data = new Room();

    $data->title             = $request->title;
    $data->hotel_name        = $request->hotel_name;
    $data->slug              = \Illuminate\Support\Str::slug($request->title) . '-' . time();
    $data->description       = $request->description;

    // Fallback: Check $request->price first, then $request->price_per_night
    $data->price_per_night   = $request->price ?? $request->price_per_night; 

    $data->capacity_adults   = $request->capacity_adults ?? 1;
    $data->capacity_children = $request->capacity_children ?? 0;
    $data->room_type         = $request->room_type;
    $data->is_featured       = $request->has('is_featured') ? 1 : 0;
    $data->is_available      = $request->input('is_available', 1);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('room_images'), $imagename);
        $data->image = $imagename;
    }

    $data->save();

    return redirect()->back()->with('message', 'Room added successfully!');
}
public function view_room()
{
    $rooms = Room::all();
    return view('admin.view_room', compact('rooms'));
}

public function delete_room($id)
{
    $room = Room::find($id);
    if ($room) {
        if ($room->image) {
            $image_path = public_path('room_images/' . $room->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $room->delete();
        return redirect()->back()->with('message', 'Room deleted successfully!');
    }
    return redirect()->back()->with('error', 'Room not found!');
}

public function edit_room($id)
{
    $room = Room::find($id);
    if (!$room) {
        return redirect()->back()->with('error', 'Room not found!');
    }
    return view('admin.edit_room', compact('room'));
}

public function update_room(Request $request, $id)
{
    $room = Room::find($id);
    if (!$room) {
        return redirect()->back()->with('error', 'Room not found!');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'nullable|numeric',
        'price_per_night' => 'nullable|numeric',
    ]);

    $room->title             = $request->title;
    $room->hotel_name        = $request->hotel_name;
    $room->slug              = \Illuminate\Support\Str::slug($request->title) . '-' . time();
    $room->description       = $request->description;
    $room->price_per_night   = $request->price ?? $request->price_per_night; 
    $room->capacity_adults   = $request->capacity_adults ?? 1;
    $room->capacity_children = $request->capacity_children ?? 0;
    $room->room_type         = $request->room_type;
    $room->is_featured       = $request->has('is_featured') ? 1 : 0;
    $room->is_available      = $request->input('is_available', 1);

    if ($request->hasFile('image')) {
        if ($room->image) {
            $old_image_path = public_path('room_images/' . $room->image);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('room_images'), $imagename);
        $room->image = $imagename;
    }

    $room->save();

    return redirect('/view_room')->with('message', 'Room updated successfully!');
}
}