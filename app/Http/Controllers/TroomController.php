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

        return view('teacher.roomdashboard', compact('room','user', 'role', 'tcount', 'scount', 'icount', 'rcount'));
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


    public function tteachersview($id)
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
        return view('teacher.teachersview', compact('user', 'role', 'room', 'c'));
    }

    public function tstudentsview($id)
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
        return view('teacher.studentsview', compact('user', 'role', 'room', 'c'));
    }

    public function tinvitemember($id)
    {
        $room = Room::find($id);
        $user = Auth::user();
        $role = auth()->user()->getRoleNames();
        $users = [$user->id];
        $allusers = User::whereHas('roles', function ($query) {
                            $query->where('name','=','host');
                        })
                        ->get();
        foreach ($allusers as $key => $value) {
            array_push($users, $value->id);
        }
        // dd($users);
        $members = User::whereNotIn('id',$users)->get();
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

        return view('teacher.invitemember', compact('user', 'role', 'room', 'members', 'already', 'invitedpending', 'requestpending'));
    }

}


//  0 = invite
//  2 = join
//  1 = confirm