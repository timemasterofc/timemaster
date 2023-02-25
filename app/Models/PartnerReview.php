<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PartnerReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'assessment_id',
        'user_id',
        'average'
    ];

    protected $casts = [
        'average' => 'float'
    ];

    public function partner(): BelongsToo
    {
        return $this->belongsTo(Partner::class);
    }

    public function assessment(): BelongsToo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function user(): BelongsToo
    {
        return $this->belongsTo(User::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }
}
