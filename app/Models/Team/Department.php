<?php

namespace App\Models\Team;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Department extends Model
{
    protected $garded = [];

    public function division() : BelongsTo {
        return $this->belongsTo(Division::class);
    }

    public function teams() : HasMany {
        return $this->hasMany(Team::class);
    }

    public function user() : MorphOne {
        return $this->morphOne(User::class, 'teamable');
    }
}
