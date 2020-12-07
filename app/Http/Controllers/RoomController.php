<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class RoomController extends Controller
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

        $id = Auth::id();
        
        $rooms = Room::where('user_id', $id)->get();
        
        // dd($rooms);

        return view('host.rooms', compact('user', 'role', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        
        // dd($c);

        return view('host.roomdashboard', compact('room','user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }

    public function teachersview($id)
    {
        $room = Room::find($id);
        $teachers = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($teachers as $value) {
            // $a = User::where('id',$value->id)->get();
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)
                ->whereHas('roles', function ($query) {
                    $query->where('name','=','teacher');
                })
                ->with('roles')->get();
            
                array_push($c, $a);
            
        }

        // dd($c);
        return view('host.teachersview', compact('user', 'role', 'room', 'c'));
    }

    public function studentsview($id)
    {
        $room = Room::find($id);
        $students = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($students as $value) {
            // $a = User::where('id',$value->id)->get();
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)
                ->whereHas('roles', function ($query) {
                    $query->where('name','=','student');
                })
                ->with('roles')->get();
            
                array_push($c, $a);
            
        }

        // dd($c);
        return view('host.studentsview', compact('user', 'role', 'room', 'c'));
    }
}
