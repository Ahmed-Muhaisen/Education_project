<?php

namespace App\Models;


class permission extends base
{
    public function role()
    {
        return $this->BelongsToMany(role::class,'permission_role');
    }

}
