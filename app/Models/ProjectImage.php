<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_type',
        'referenced_id',
        'title',
        'caption',
        'image_path',
    ];

    public function pastProject()
    {
        return $this->belongsTo(PastProject::class, 'referenced_id');
    }
}
