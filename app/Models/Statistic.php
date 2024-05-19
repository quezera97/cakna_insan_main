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
        'individual_helped',
        'happy_individual',
        'no_of_projects',
    ];
}
