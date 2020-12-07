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

    

    
}
