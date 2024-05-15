<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function projectDonation() : HasMany
    {
        return $this->hasMany(ProjectDonation::class, 'project_id');
    }

    public function bannerJumbotron() : HasMany
    {
        return $this->hasMany(BannerJumbotron::class, 'details_button_url');
    }

    public function donationDetail() : HasOne
    {
        return $this->hasOne(DonationDetail::class, 'project_id');
    }

    public function banner() : HasOne
    {
        return $this->hasOne(ProjectBanner::class, 'project_id');
    }

    public function video() : HasMany
    {
        return $this->hasMany(VideoDetail::class, 'project_id');
    }
}
