<?php

namespace App\Models\Team;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Team extends Model
{
    protected $garded = [];

    public function department() : BelongsTo {
        return $this->BelongsTo(Department::class);
    }

    public function leader() : MorphOne {
        return $this->morphOne(User::class, 'teamable')->where('role', 'leader');
    }

    public function users() : MorphMany {
        return $this->morphMany(User::class, 'teamable')->where('role', 'user');
    }
}
