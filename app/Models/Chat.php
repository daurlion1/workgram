<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'creator_id',
        'implementor_id',

    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function implementer()
    {
        return $this->hasOne(User::class, 'id', 'implementer_id');
    }

}
