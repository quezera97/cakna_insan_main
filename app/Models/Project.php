<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectable_type',
        'projectable_id',
        'has_passed',
        'is_featured',
        'donation_needed',
        'folder_path',
    ];

    public function projectable() : MorphTo
    {
        return $this->morphTo();
    }

    public function projectDonation()
    {
        return $this->hasMany(ProjectDonation::class, 'project_id');
    }
}
