<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticable
{
    Use Notifiable;
    Use SoftDeletes;

    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
