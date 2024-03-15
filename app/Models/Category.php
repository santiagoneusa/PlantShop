<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contiene la clave primaria de la categoría (id)
     * $this->attributes['name'] - string - contiene el nombre de la categoría
     * $this->attributes['description'] - text - contiene la descripción de la categoría
     * $this->attributes['created_at'] - timestamp - marca de tiempo que indica la creación de la categoría
     * $this->attributes['updated_at'] - timestamp - marca de tiempo que indica la última actualización de la categoría
     */
    protected $fillable = ['name', 'description'];

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

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
