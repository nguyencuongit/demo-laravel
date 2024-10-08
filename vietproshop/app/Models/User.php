<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "id",
        "fullname",
        "email",
        "password",
        "phone",
        "address",
        "level",
    ];

    protected $hidden = [
        "password",
    ];
}
