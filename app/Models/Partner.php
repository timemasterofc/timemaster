<?php

namespace App\Models;

use App\Enums\PersonType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'person_type',
        'provider',
        'social_reason',
        'fantasy_name',
        'document',
        'name_representative',
        'document_representative',
        'average_rating',
        'total_followers'
    ];

    protected $casts = [
        'average' => 'float',
        'total_followers' => 'integer',
        'person_type' => PersonType::class,
        'provider' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'followers', 'user_id', 'partner_id');
    }

    public function viewProfiles()
    {
        return $this->hasMany(ViewProfile::class);
    }

    public function reportables(): MorphMany
    {
        return $this->morphMany(Report::class);
    }

    public function configuration(): HasOne
    {
        return $this->hasOne(Configuration::class);
    }
}
