<?php

namespace App\User\Infrastructure\Database\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'vkid'
    ];
}
