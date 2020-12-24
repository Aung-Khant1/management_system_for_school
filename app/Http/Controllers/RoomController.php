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
        $teachers = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('role_id', 3)
                    ->where('status', 1)
                    ->get();
        $tcount = count($teachers);

        $students = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('role_id', 4)
                    ->where('status', 1)
                    ->get();
        $scount = count($students);


        $imembers = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('status', 0)
                    ->get();
        $icount = count($imembers);

        $rmembers = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('status', 2)
                    ->get();
        $rcount = count($rmembers);
        
        // dd($tcount);

        return view('host.roomdashboard', compact('room','user', 'role', 'tcount', 'scount', 'icount', 'rcount'));
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
                    ->where('role_id', 3)
                    ->where('status', 1)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($teachers as $key => $value) {
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)
                // Optional
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
                    ->where('role_id', 4)
                    ->where('status', 1)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($students as $value) {
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)
                // Oprional
                ->whereHas('roles', function ($query) {
                    $query->where('name','=','student');
                })
                ->with('roles')->get();
            
                array_push($c, $a);
            
        }

        // dd($c);
        return view('host.studentsview', compact('user', 'role', 'room', 'c'));
    }

    public function memberrequest($id)
    {
        $room = Room::find($id);
        $members = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('status', 2)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($members as $value) {
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)->with('roles')->get();
            
                array_push($c, $a);
            
        }

        // dd($c);
        return view('host.memberrequest', compact('user', 'role', 'room', 'c'));

        // return view('host.memberrequest', compact('user', 'role', 'room'));
    }

    public function invitedmember($id)
    {
        $room = Room::find($id);
        $members = DB::table('user_in__rooms')
                    ->where('room_id', $id)
                    ->where('status', 0)
                    ->get();
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $v = [];
        foreach ($members as $value) {
            
                array_push($v, $value->user_id);
            
        }
        $c = [];
        foreach ($v as $key => $value) {
            $a = User::where('id',$value)->with('roles')->get();
            
                array_push($c, $a);
            
        }

        // dd($c);
        return view('host.invitedmember', compact('user', 'role', 'room', 'c'));
    }

    public function invitemember($id)
    {
        $room = Room::find($id);
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $members = User::whereNotIn('id',[$user->id])->get();
        $userinaroom = DB::table('user_in__rooms')
                    ->where([['room_id',$id],['status',1]])
                    ->get();
        $already = [];
        foreach ($userinaroom as $key => $value) {
            array_push($already,$value->user_id);
        };

        $invitedpendinguser = DB::table('user_in__rooms')
                    ->where([['room_id',$id],['status',0]])
                    ->get();
        $invitedpending = [];
        foreach ($invitedpendinguser as $key => $value) {
            array_push($invitedpending,$value->user_id);
        };

        $requestpendinguser = DB::table('user_in__rooms')
                    ->where([['room_id',$id],['status',2]])
                    ->get();
        $requestpending = [];
        foreach ($requestpendinguser as $key => $value) {
            array_push($requestpending,$value->user_id);
        };
        // $members = $members->diff(User::whereIn('id',$a)->with('roles')->get());

        // dd($already);

        return view('host.invitemember', compact('user', 'role', 'room', 'members', 'already', 'invitedpending', 'requestpending'));
    }


    public function confirmreq($rid,$uid)
    {
        // dd($rid,$uid);
        
        $croom = Room::find($rid);
   
        $croom->users()->updateExistingPivot($uid,['status'=>1],false);

        return back();
        
    }

    public function removereq($rid,$uid)
    {
        

        $room = Room::find($rid);
        
        $room->users()->detach($uid);

        return back();
    }

    public function inviteuser(Request $request)
    {
        $rid = $request->rid;
        $uid = $request->uid;

        
        $userRole = DB::table('model_has_roles')
                    ->where('model_id','=',$uid)
                    ->get();
        $userhas = DB::table('user_in__rooms')
                    ->where([['room_id','=',$rid],['user_id','=',$uid]])
                    ->get();
    
    
        $count = count($userhas);
        $reply = ['User already exit!'];
        if ($count < 1) {
            $room = Room::find($rid);
            $room->users()->attach($uid,['role_id'=>$userRole[0]->role_id]);
            return $room;
        }else{
            return $reply;
        }
        
        
        
    }





    // This method need to refresh in browser so I don't use
    // public function removemember(Request $request)
    // {
    //     $rid = $request->rid;
    //     $uid = $request->uid;
    //     $room = Room::find($rid);
        
    //     $room->users()->detach($uid);

    //     return $room;
    // }



}




