<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sport;
use App\Models\Matching;
use App\Models\Stadium;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'stadia_id',
        'sport_id',
    ];
    public function sports(): BelongsTo{
        return $this->belongsTo(Sport::class);
    }
    public function matchings():HasMany{
        return $this->hasMany(Matching::class);
    }
    public function booking():HasMany{
        return $this->hasMany(Booking::class);
    }
    public function stadias():BelongsTo{
        return $this->belongsTo(Stadium::class);
    }
}
