<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
}
