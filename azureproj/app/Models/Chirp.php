<?php

namespace App\Models;

use App\Models\User;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chirp extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
    ];

    //add chirp to user relationship
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //add the event listener
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
}
