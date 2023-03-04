<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\ServiceStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'banned',
        'verified_document'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
        'banned' => 'boolean',
        'verified_document' => 'datetime'
    ];

    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function blockedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'blocked_user', 'user_id', 'blocked_user_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class, 'followers', 'user_id', 'partner_id');
    }

    public function viewProfiles()
    {
        return $this->hasMany(ViewProfile::class);
    }

    public function reportables(): MorphMany
    {
        return $this->morphMany(Report::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'post_id', 'user_id');
    }

    public function password(): Attribute
    {
        return new Attribute(
            set: function($value) {
                if(!empty($value) && !is_null($value)) {
                    return bcrypt($value);
                }
            }
        );
    }
}
