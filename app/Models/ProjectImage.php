<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_type',
        'referenced_id',
        'title',
        'caption',
        'image_path',
        'arrangement',
    ];

    public function pastProject() : BelongsTo
    {
        return $this->belongsTo(PastProject::class, 'referenced_id');
    }

    public function incomingProject() : BelongsTo
    {
        return $this->hasMany(ProjectImage::class, 'referenced_id')->where('reference_type', IncomingProject::class);
    }
}
