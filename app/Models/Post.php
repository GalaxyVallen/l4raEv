<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excrpt', 'content'];
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['s'] ?? false, function ($query, $sS) {
            return $query->where('title', 'like', '%' . $sS . '%')
                ->orWhere('content', 'like', '%' . $sS . '%');
        });

        $query->when($filters['c'] ?? false, function ($query, $c) {
            return $query->whereHas('category', function ($query) use ($c) {
                $query->where('slug', $c);
            });
        });

        $query->when($filters['a'] ?? false, function ($query, $a) {
            return $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $a)
            );
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
