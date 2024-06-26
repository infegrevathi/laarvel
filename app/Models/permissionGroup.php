<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\permission;
use Spatie\Permission\Models\Permission;

class permissionGroup extends Model
{
    use HasFactory;

    public function permissions(){
        return $this->HasMany(Permission::class);

    }
}
