<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'creator_id',
        'implementer_id',
        'description',
        'price',
        'latitude',
        'longitude',
        'status',
        'start',
        'finish'
    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function implementer()
    {
        return $this->hasOne(User::class, 'id', 'implementer_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
