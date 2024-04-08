<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function partecipations() {
        return $this->hasMany(Partecipation::class, 'event_id');
    }
}
