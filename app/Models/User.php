<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['role'] - string - contains the user role (client or admin)
     * $this->attributes['balance'] - int - contains the user balance
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date

     * $this->orders
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }
}
