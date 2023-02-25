<?php

namespace App\Models;

use App\Enums\ReportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'status'
    ];

    protected $casts = [
        'status' => ReportStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reportable()
    {
        return $this->morphTo();
    }
}
