<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserDetail extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
