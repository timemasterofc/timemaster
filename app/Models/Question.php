<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'question',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
