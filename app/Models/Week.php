<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function configurations(): BelongsToMany
    {
        return $this->belongsToMany(Configuration::class);
    }
}
