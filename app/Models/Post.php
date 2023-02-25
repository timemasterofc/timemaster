<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'content',
        'total_likes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id', 'id');
    }
    public function parents(): HasMany
    {
        return $this->hasMany(Post::class, 'parent_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id');
    }
}
