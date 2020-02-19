<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomSidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'room_link' => 'room-open',
        );

        $rooms = Room::all();

        return view('room.index')
          ->with('rooms', $rooms)
          ->with($roomSidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roomSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'room_link' => 'room-open',
      );

      $rooms = Room::all();

      return view('room.create')
        ->with('rooms', $rooms)
        ->with($roomSidebar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'room_type' => 'required',
          'room_desc' => 'required',
          'room_amount' => 'required',
        ]);

        $room = new Room;

        $room->type = $request->input('room_type');
        $room->description = $request->input('room_desc');
        $room->amount = $request->input('room_amount');
        $room->save();

        return redirect('http://localhost/hmo/public/maintenance/room/create')->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $roomSidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'room_link' => 'room-open',
      );

      $room = Room::find($id);

      return view('room.edit')
        ->with('room', $room)
        ->with($roomSidebar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $this->validate($request,[
        'room_type' => 'required',
        'room_desc' => 'required',
        'room_amount' => 'required',
      ]);

      $room = Room::find($id);
      $room->type = $request->input('room_type');
      $room->description = $request->input('room_desc');
      $room->amount = $request->input('room_amount');
      $room->save();

      return redirect('http://localhost/hmo/public/maintenance/room')->with('success', 'Edited Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();

        return redirect('http://localhost/hmo/public/maintenance/room')->with('success', 'Edited Successfully');
    }
}
