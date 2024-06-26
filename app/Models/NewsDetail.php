<?php

namespace App\Models;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsDetail extends Model
{
    use HasFactory, Hashidable;

    protected $fillable = [
        'type_of_news',
        'title',
        'subtitle',
        'details',
        'date',
        'related_url',
        'author',
        'folder_path',
    ];

    public function newsImage() : HasMany
    {
        return $this->hasMany(NewsImage::class, 'news_id');
    }
}
