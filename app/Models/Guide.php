<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Guide extends Model
{
    /**
     * GUIDE ATTRIBUTES
     * $this->attributes['id'] - int - contains the guide primary key (id)
     * $this->attributes['title'] - string - contains the title of the guide
     * $this->attributes['content'] - text - contains the content of the guide
     * $this->attributes['image'] - string - contains the direction where the image of the guide is stored
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     */
    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public static function validate(request $request): void
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required'],
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getContent(): string
    {
        return $this->attributes['content'];
    }

    public function setContent(string $content): void
    {
        $this->attributes['content'] = $content;
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

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function setContent(string $content): void
    {
        $this->attributes['content'] = $content;
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }
}
