<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannerJumbotron extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'details',
        'is_featured',
        'banner_file_name',
        'banner_image_path',
        'donation_button_url',
        'details_button_url',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'details_button_url');
    }
}
