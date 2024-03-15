<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    /**
     * PLANT ATTRIBUTES
     * $this->attributes['id'] - int - contains the plant primary key (id)
     * $this->attributes['name'] - string - contains the plant name
     * $this->attributes['description'] - text - contains the plant description
     * $this->attributes['imageUrl'] - string - contains the url of the plant image
     * $this->attributes['price'] - int - contains the plant price
     * $this->attributes['stock'] - int - contains the remain stock units of the plant
     * $this->attributes['categoryId'] - int - Contains the ID of the category to which the plant belongs
     * $this->attributes['created_at'] - timestamp - timestamp indicating plant creation
     * $this->attributes['updated_at'] - timestamp - timestamp indicating last plant update
     */
    protected $fillable = ['name', 'description', 'imageUrl', 'price', 'stock', 'categoryId'];

    public function getId(): int
    {
        return $this->attributes['id'];
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

    public function getImageUrl(): string
    {
        return $this->attributes['imageUrl'];
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->attributes['imageUrl'] = $imageUrl;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getCategoryId(): int
    {
        return $this->attributes['categoryId'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['categoryId'] = $categoryId;
    }
}
