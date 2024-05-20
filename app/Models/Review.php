<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['content'] - text - contains the content of the review
     * $this->attributes['stars'] - int - contains the number of stars given to the plant (0 to 5)
     * $this->attributes['status'] - string - contains the status of the review (unchecked, approved, rejected)
     * $this->attributes['created_at'] - timestamp - timestamp indicating review creation
     * $this->attributes['updated_at'] - timestamp - timestamp indicating last review update
     *
     * $this->attributes['plant_id'] - int - contains the ID of the plant to which the review belongs
     * $this->plant - Plant - contains the ID of the plant to which the review belongs
     * $this->attributes['user_id'] - int - contains the ID of the plant to which the review belongs
     * $this->user - User - contains the ID of the plant to which the review belongs
     */
    protected $fillable = [
        'content',
        'stars',
        'status',
        'plant_id',
        'user_id',
    ];

    public static function validate(Request $request): void
    {
        $request->validate([
            'content' => ['required'],
            'stars' => ['required', 'integer', 'between:1,5'],
            'plant_id' => ['required', 'exists:plants,id'],
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getContent(): string
    {
        return $this->attributes['content'];
    }

    public function setContent(string $content): void
    {
        $this->attributes['content'] = $content;
    }

    public function getStars(): int
    {
        return $this->attributes['stars'];
    }

    public function setStars(int $stars): void
    {
        $this->attributes['stars'] = $stars;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    
    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }

    public function getPlant(): Plant
    {
        return $this->plant;
    }

    public function getPlantId(): int
    {
        return $this->attributes['plant_id'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }
}
