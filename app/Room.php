<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'name', 'photo', 'roomno', 'password', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','user_in__rooms')
                    ->withTimestamps();
    }

	
}
