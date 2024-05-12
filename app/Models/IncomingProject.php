<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class IncomingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'details',
        'date_from',
        'date_to',
        'time_from',
        'time_to',
        'place',
        'pax',
        'transportation',
        'poster_image_path',
    ];

    public function project(): MorphOne
    {
        return $this->morphOne(project::class, 'projectable');
    }

    public function incomingProjectImages() : HasMany
    {
        return $this->hasMany(ProjectImage::class, 'referenced_id');
    }
}
