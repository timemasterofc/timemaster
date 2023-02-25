<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'use_schedule',
        'remove_busy_schedule',
        'start_lunch',
        'end_lunch',
        'rest_break'
    ];

    protected $casts = [
        'use_schedule' => 'boolean',
        'remove_busy_schedule' => 'boolean',
        'start_lunch' => 'datetime:H:i:s',
        'end_lunch' => 'datetime:H:i:s',
        'rest_break' => 'datetime:H:i:s',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function weeks(): BelongsToMany
    {
        return $this->belongsToMany(Week::class);
    }
}
