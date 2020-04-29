<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ADMIN_ID = 1;
    public const USER_ID = 2;


    protected $fillable = [
        'name'
    ];
}
