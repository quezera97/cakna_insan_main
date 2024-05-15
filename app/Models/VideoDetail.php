<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'video_type',
        'iframe_components',
        'title',
        'subtitle',
        'details',
        'arrangement',
    ];

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}





