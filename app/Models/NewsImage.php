<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'type',
        'title',
        'caption',
        'image_path',
        'arrangement',
    ];

    public function news() : BelongsTo
    {
        return $this->belongsTo(NewsDetail::class, 'news_id');
    }
}
