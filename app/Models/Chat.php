<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{





    protected $fillable = [
        'creator_id',
        'implementer_id',

    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function implementer()
    {
        return $this->hasOne(User::class, 'id', 'implementer_id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }


}
