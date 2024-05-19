<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - text - contains the category description
     * $this->attributes['image'] - text - contains the category image cover
     * $this->attributes['created_at'] - timestamp - timestamp indicating category creation
     * $this->attributes['updated_at'] - timestamp - timestamp indicating last category update
     *
     * $this->plants - Plant[] - contains the associated plants
     */
    protected $fillable = ['name', 'description'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function plants(): HasMany
    {
        return $this->hasMany(Plant::class);
    }

    public function getPlants(): Collection
    {
        return $this->plants;
    }

    public function setPlants(Collection $plants): void
    {
        $this->plants = $plants;
    }
}
