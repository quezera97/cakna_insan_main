<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'email',
        'phone',
        'role',
    ];
}
