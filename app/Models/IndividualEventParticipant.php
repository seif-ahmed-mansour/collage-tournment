<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualEventParticipant extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'individual_event_id',
        'user_id',
        'score',
    ];

    /**
     * Get the individual event associated with the participant.
     */
    public function individualEvent() {
        return $this->belongsTo(IndividualEvent::class);
    }

    /**
     * Get the user associated with the participant.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
