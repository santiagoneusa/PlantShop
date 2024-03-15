<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['user_id'] - string - contains as a foreign key the id of the user that made the order
     * $this->attributes['total'] - string - contains the total cost of the order
     * $this->attributes['address'] - string - contains the place the order will be send
     * $this->attributes['status'] - string - contains the state of the order (Complete, Sent, Delivered)
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     */
    public static function validate(): void
    {

    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function getAddress(): void
    {
        return $this->attributes['address'];
    }

    public function getStatus(): void
    {
        return $this->attributes['status'];
    }

    public function getCreatedAt(): void
    {
        return $this->attributes['created_at'];
    }
}
