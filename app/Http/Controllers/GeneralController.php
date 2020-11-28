<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Room;

class GeneralController extends Controller
{
    public function singup($value='')
    {
    	return view('register');
    }

    public function rooms($value='')
    {
    	$user = Auth::user();
        $role = auth()->user()->getRoleNames();

        $id = Auth::id();
        
        $rooms = Room::where('user_id', $id)->get();
        
        // dd($rooms);

    	return view('host.rooms', compact('user', 'role', 'rooms'));
    }
}
