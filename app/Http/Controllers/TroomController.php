<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TroomController extends Controller
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
        
        $rooms_ids = DB::table('user_in__rooms')->where([['user_id', $id],['status',1]])->get();

        $rooms_id = [];
        foreach ($rooms_ids as $key => $value) {
            array_push($rooms_id, $value->room_id);
        }

        $rooms = [];
        foreach ($rooms_id as $key => $value) {
            $room = Room::where('id',$value)->get();
            array_push($rooms,$room);
        }
        
        // dd($rooms);



        return view('teacher.rooms', compact('user', 'role', 'rooms'));
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
        $rooms = Room::all();
        $id = Auth::id();
        $hasroom = DB::table('user_in__rooms')
                    ->where([['user_id', $id],['status',1]])
                    ->get();
        $already = [];
        foreach ($hasroom as $key => $value) {
            array_push($already, $value->room_id);
        }

        $invitedpendingroom = DB::table('user_in__rooms')
                    ->where([['user_id', $id],['status',0]])
                    ->get();
        $invitedpending = [];
        foreach ($invitedpendingroom as $key => $value) {
            array_push($invitedpending, $value->room_id);
        }

        $joinpendingroom = DB::table('user_in__rooms')
                            ->where([['user_id', $id],['status',2]])
                            ->get();
        $joinpending = [];
        foreach ($joinpendingroom as $key => $value) {
            array_push($joinpending, $value->room_id);
        }
        // dd($invitedpending);

        return view('teacher.joinroom', compact('user', 'role', 'rooms', 'already', 'invitedpending', 'joinpending'));
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
    
    public function joinroom(Request $request)
    {
        $uid = Auth::id();
        $rid = $request->rid;
        $alreadyjoin = DB::table('user_in__rooms')
                        ->where([['user_id',$uid],['room_id',$rid]])
                        ->get();
        $usercount = count($alreadyjoin);
        $errorMsg = ['Somethig went wrong!'];
        if ($usercount > 1) {
            return $errorMsg;
        }else {
            $room = Room::find($rid);
            $userRole = DB::table('model_has_roles')
                        ->where('model_id',$uid)
                        ->get();
            $room->users()->attach($uid,['role_id'=>$userRole[0]->role_id,'status'=>2]);
            return $room;
        }
        
    }

    public function roomreq()
    {
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $requestedRooms = DB::table('user_in__rooms')
                            ->where([['user_id',$user->id],['status',2]])
                            ->get();
        $rooms_id = [];
        foreach ($requestedRooms as $key => $value) {
            array_push($rooms_id,$value->room_id);
        }

        $rooms = [];
        foreach ($rooms_id as $key => $value) {
            $room = Room::where('id',$value)->get();
            array_push($rooms,$room);
        }

        // dd($rooms);
        
        return view('teacher.roomreq', compact('user', 'role', 'rooms'));
        
    }

    public function reqrooms()
    {
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $requestedRooms = DB::table('user_in__rooms')
                            ->where([['user_id',$user->id],['status',0]])
                            ->get();
        $rooms_id = [];
        foreach ($requestedRooms as $key => $value) {
            array_push($rooms_id,$value->room_id);
        }

        $rooms = [];
        foreach ($rooms_id as $key => $value) {
            $room = Room::where('id',$value)->get();
            array_push($rooms,$room);
        }

        // dd($rooms);
        
        return view('teacher.reqrooms', compact('user', 'role', 'rooms'));
        
    }

    public function roomreqcancel($rid)
    {
        $uid = Auth::id();
        $rid = $rid;
        $user = DB::table('user_in__rooms')
                ->where([['user_id',$uid],['room_id',$rid]])
                ->get();
        $count = count($user);
        if ($count > 0) {
            $room = Room::find($rid);
            $room->users()->detach($uid);
            return back();
        }

        
    }

    public function roomreqconfirm($rid)
    {
        $uid = Auth::id();
        $rid = $rid;
        $user = DB::table('user_in__rooms')
                ->where([['user_id',$uid],['room_id',$rid]])
                ->get();
        $count = count($user);
        if ($count > 0) {
            $room = Room::find($rid);
            $room->users()->updateExistingPivot($uid,['status'=>1],false);
            return back();
        }

        
    }

}


//  0 = invite
//  2 = join
//  1 = confirm