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
        'date_from',
        'date_to',
        'image_path',
    ];

    public function project(): MorphOne
    {
        return $this->morphOne(project::class, 'projectable');
    }
}
