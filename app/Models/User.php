<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Staudenmeir\LaravelMergedRelations\Eloquent\HasMergedRelationships;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasMergedRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function feeds(): HasMany
    {
        return $this->hasMany(Feed::class);
    }

    public function fromBaseFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('from', 'to');
    }

    public function receivedBaseFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('to', 'from');
    }

    public function fromPendingFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('from', 'to')->wherePivotNull('accepted_at')->wherePivotNull('rejected_at');
    }

    public function receivedPendingFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('to', 'from')->wherePivotNull('accepted_at')->wherePivotNull('rejected_at');
    }

    public function fromAcceptedFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('from', 'to')->wherePivotNotNull('accepted_at');
    }

    public function receivedAcceptedFriendRequests(): BelongsToMany
    {
        return $this->baseFriendsRelation('to', 'from')->wherePivotNotNull('accepted_at');
    }

    public function friends(): \Staudenmeir\LaravelMergedRelations\Eloquent\Relations\MergedRelation
    {
        return $this->mergedRelationWithModel(self::class, 'friends');
    }

    public function scopePotentialFriends($query, int $userId)
    {
        $query->whereNot('id', $userId)
            ->whereDoesntHave('fromBaseFriendRequests', fn ($query) => $query->where('to', $userId))
            ->whereDoesntHave('receivedBaseFriendRequests', fn ($query) => $query->where('from', $userId));
    }

    private function baseFriendsRelation(string $foreign, string $related): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'friend_requests',
            $foreign,
            $related
        )
            ->withPivot('accepted_at', 'rejected_at')
            ->withTimestamps();
    }
}
