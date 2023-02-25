<?php

namespace App\Models;

use App\Enums\ServiceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_service_id',
        'title',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => ServiceStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function typeService(): BelongsTo
    {
        return $this->belongsTo(TypeService::class);
    }

    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class)->withPivot('accepted');
    }

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class);
    }

    public function reportables(): MorphMany
    {
        return $this->morphMany(Report::class);
    }
}
