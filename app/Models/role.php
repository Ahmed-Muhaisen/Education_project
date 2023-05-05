<?php

namespace App\Models;

use App\Models\base;
use App\Models\permission;


class role extends base
{
public function permission()
{
    return $this->BelongsToMany(permission::class,'permission_role');
}

public function user()
{
    return $this->BelongsToMany(User::class,'role_user');
}




}
