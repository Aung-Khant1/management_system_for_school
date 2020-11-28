<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_in_Room extends Model
{
    protected $fillable = [
    	'room_id', 'user_id'
    ];
}
