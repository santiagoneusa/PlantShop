<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['address'] - string - contains the place the order will be send
     * $this->attributes['total'] - string - contains the total cost of the order
     * $this->attributes['status'] - string - contains the state of the order (Complete, Sent, Delivered)
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date

     * $this->attributes['user_id'] - string - contains as a foreign key the id of the user that made the order
     * $this->user - User - contains the associated user
     * $this->items - Item[] - contains the associated items
     */
    protected $fillable = [
        'address',
        'user_id',
        'total',
    ];

    public static function validate(request $request): void
    {
        $request->validate([
            'total' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getAddress(): void
    {
        return $this->attributes['address'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function getStatus(): void
    {
        return $this->attributes['status'];
    }

    public function getCreatedAt(): void
    {
        return $this->attributes['created_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }
}
