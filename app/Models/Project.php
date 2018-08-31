<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function owner()
    {
        $this->hasOne(User::id);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
