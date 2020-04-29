<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'author_id',
        'text',
        'image_path',
        'video_path',
        'audio_path',
        'doc_path',

    ];
    public function chat(){

        return $this->hasOne(Chat::class, 'id', 'chat_id');

    }

    public function author(){

        return $this->hasOne(User::class, 'id', 'author_id');

    }
}
