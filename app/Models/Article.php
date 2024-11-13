<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'purpose',
        'reflections',
        'creativity',
        'activity',
        'service',
        'context',
        'evaluation',
        'sustainability',
        'visual_caption',
        'is_published',
        'published_at',
        'category_id',
        'slug',
        'image',
        'visual_documentation',
    ];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con las etiquetas (tags)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
