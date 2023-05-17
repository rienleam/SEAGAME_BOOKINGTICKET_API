<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadia extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'zone_a',
        'zone_b',
    ];
    public function events(): HasMany{
        return $this->hasMany(Event::class);
    }
}
