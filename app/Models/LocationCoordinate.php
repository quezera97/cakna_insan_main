<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCoordinate extends Model
{
    use HasFactory;

    protected $fillable = [
        'longitude',
        'latitude',
        'place_or_country',
        'date',
    ];
}
