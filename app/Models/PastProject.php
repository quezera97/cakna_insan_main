<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class PastProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'details',
        'date',
        'place',
        'pax',
        'transportation',
        'poster_image_path',
    ];

    public function project(): MorphOne
    {
        return $this->morphOne(Project::class, 'projectable');
    }

    public function pastProjectImages()
    {
        return $this->hasMany(ProjectImage::class, 'referenced_id');
    }
}
