<?php

namespace App\Models\Team;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Division extends Model
{
    protected $garded = [];

    public function departments() : HasMany {
        return $this->hasMany(Department::class);
    }

    public function user() : MorphOne {
        return $this->morphOne(User::class, 'teamable');
    }
}
