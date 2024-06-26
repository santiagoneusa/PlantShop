<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains
     * $this->attributes['price'] - int - contains
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     *
     * $this->plant - Plant - contains the associated Plant
     * $this->attributes['plant_id'] - string - contains as a foreign key the id of the plant associated
     * $this->order - Order - contains the associated Order
     * $this->attributes['order_id'] - string - contains as a foreign key the id of the order that contains the item
     */
    public static function validate(request $request): void
    {
        $request->validate([
            'quantity' => ['required'],
            'price' => ['required'],
            'plant_id' => ['required', 'exists:plants,id'],
            'order_id' => ['required', 'exists:orders,id'],
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

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
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

    public function setPlant(Plant $plant): void
    {
        $this->plant = $plant;
    }

    public function getPlantId(): int
    {
        return $this->attributes['plant_id'];
    }

    public function setPlantId(int $plantId): void
    {
        $this->attributes['plant_id'] = $plantId;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }
}
