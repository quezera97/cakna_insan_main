<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectable_type',
        'projectable_id'
    ];


    public function projectable()
    {
        return $this->morphTo();
    }
}
