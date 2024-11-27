<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request)
    {

        Room::create([
            'room_number' => $request->room_number,
        ]);
        // alert()->succes('Success', 'Room Add Successfully');
        return redirect()->back();
    }


    public function show()
    {
        $rooms = Room::all();
        return view('admin.room.index')->with('rooms', $rooms);
    }

    public function delete($id)
    {
        $room = Room::find($id);
        $room = $room->delete();
        alert()->succes('Success', 'Room Delete Successfully');
        return redirect()->back();
    }
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.room.edit')->with('room', $room);
    }
    public function update(Request $request)
    {
        $room = Room::find($request->id);
        $rooms =  $room->update($request->all());
        if ($rooms) {
            alert()->succes('Success', 'Room Update Successfully');
            return redirect()->route('admin.room.index');
        } else {
            alert()->error('Error', 'Room not update Successfully');
            return redirect()->route('admin.room.index');
        }
    }
    public function create()
    {
        $rooms = Room::all();
        return view('admin.bed.store_bed', compact('rooms'));
    }

    public function storeBed(Request $request)
    {
        Bed::create([
            'room_id' => $request->room_id,
            'bed_number' => $request->bed_number,
        ]);

        alert()->success('success', 'Bed store Successfully');
        return redirect()->back();
    }
    public function index()
    {
        $beds = Bed::with('room')->get();
        return view('admin.bed.index', compact('beds'));
    }

    public function destroy($id)
    {
        $bed = Bed::findOrFail($id);
        $bed->delete();

        alert()->success('Success', 'Bed Number delete Successfully');
        return redirect()->route('bed.list');
    }
}
