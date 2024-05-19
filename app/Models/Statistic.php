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
        'statistic_1',
        'statistic_2',
        'statistic_3',
        'statistic_4',
        'statistic_1_value',
        'statistic_2_value',
        'statistic_3_value',
        'statistic_4_value',
    ];
}
