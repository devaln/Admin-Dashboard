<?php

namespace App\Models;

use Spatie\Permission\Models\Role as OriginalRole;
use Illuminate\Database\Eloquent\Model;

class Role extends OriginalRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at'
    ];
}
