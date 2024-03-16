<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['content'] - text - contains the content of the review
     * $this->attributes['stars'] - int - contains the number of stars given to the plant (0 to 5)
     * $this->attributes['status'] - string - contains the status of the review (unchecked, approved, rejected)
     * $this->attributes['plant_id'] - int - contains the ID of the plant to which the review belongs
     * $this->attributes['created_at'] - timestamp - timestamp indicating review creation
     * $this->attributes['updated_at'] - timestamp - timestamp indicating last review update
     */
    protected $fillable = ['content', 'stars', 'status', 'plant_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
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

    public function getPlantId(): int
    {
        return $this->attributes['plant_id'];
    }

    public function setPlantId(int $plantId): void
    {
        $this->attributes['plant_id'] = $plantId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
