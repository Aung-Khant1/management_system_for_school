<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        // dd($role);
        
        return view('host.index', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        return view('host.create', compact('user', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max:255 | unique:rooms',
            'password' => 'required | string | min:8',
        ]);

        $user_id = Auth::id();
        $room_photo = 'assets/images/room_img.jpg';
        // dd($user_id);
        

        $room = new Room;
        $room->name = $request->name;
        $room->photo = $room_photo;
        $room->roomno = uniqid();
        $room->password = $request->password;
        $room->user_id = $user_id;
        $room->save();

        // dd($room);
        $room->users()->attach($user_id);

        return redirect()->route('hrooms');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
