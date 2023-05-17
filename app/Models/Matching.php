<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matching extends Model
{
    use HasFactory;
    protected $fillable = [
        'team1',
        'team2',
        'time',
        'description',
        'event_id',
    ];
    public function events():BelongsTo{
        return $this->belongsTo(Event::class);
    }
}
