<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_auth extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'email',
            'password',
            'avatar',
            'status',
            'token',
            'level'
    ];
}
