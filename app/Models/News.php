<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image',
        'author',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    /**
     * Generar slug único a partir del título.
     */
    public static function generateSlug(string $title, ?int $exceptId = null): string
    {
        $slug  = Str::slug($title);
        $count = 0;
        $original = $slug;

        while (true) {
            $query = self::where('slug', $slug);
            if ($exceptId) {
                $query->where('id', '!=', $exceptId);
            }
            if (!$query->exists()) {
                break;
            }
            $count++;
            $slug = $original . '-' . $count;
        }

        return $slug;
    }

    /** Scope: noticias publicadas. */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('published_at', 'desc');
    }
}
