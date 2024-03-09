<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamEvent extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'category',
    ];

    /**
     * Get the participants for the team event.
     */
    public function teamEventParticipants() {
        return $this->hasMany(TeamEventParticipant::class);
    }
}
