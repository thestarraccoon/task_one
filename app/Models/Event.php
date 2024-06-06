<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $primaryKey = 'event_id';
    protected $fillable = ['header', 'event_text', 'user_id'];
    protected $guarded = ['event_id'];
    const UPDATED_AT = null;

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_participants', 'participant_id', 'user_id');
    }
}
