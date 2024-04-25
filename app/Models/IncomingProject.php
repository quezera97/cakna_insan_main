<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'details',
        'date_from',
        'date_to',
    ];

    public function project(): MorphOne
    {
        return $this->morphOne(project::class, 'projectable');
    }
}
