<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'is_accepted',
        'is_to_specific_user',

    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
