<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamEventParticipant extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'team_event_id',
        'score',
    ];

    /**
     * Get the user associated with the team event participant.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the team associated with the team event participant.
     */
    public function team() {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the team event associated with the team event participant.
     */
    public function teamEvent() {
        return $this->belongsTo(TeamEvent::class);
    }
}
