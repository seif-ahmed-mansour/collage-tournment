<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the users that belong to the team.
     */
    public function users() {
        return $this->hasMany(User::class);
    }

    /**
     * Get the team event participants for the team.
     */
    public function teamEventParticipants() {
        return $this->hasMany(TeamEventParticipant::class);
    }
}
