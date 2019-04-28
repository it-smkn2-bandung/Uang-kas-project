<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ClassRoom extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
