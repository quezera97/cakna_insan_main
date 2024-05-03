<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerJumbotron extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'details',
        'date_from',
        'date_to',
        'is_featured',
        'banner_file_name',
        'banner_image_path',
    ];
}
