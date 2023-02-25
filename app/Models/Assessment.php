<?php

namespace App\Models;

use App\Enums\AssessmentTypePartner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_partner',
        'title',
        'active'
    ];

    protected $casts = [
        'type_partner' => AssessmentTypePartner::class,
        'active' => 'boolean'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
