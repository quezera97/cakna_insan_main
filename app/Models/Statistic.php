<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'volunteers',
        'individu_helped',
        'happy_families',
        'no_of_projects',
    ];
}
