<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'caption',
        'image_path',
    ];

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
