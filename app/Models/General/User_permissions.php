<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;
use App\User;

class User_permissions extends Model
{
    //

    //sprotected $fillable = ['id_user', 'id_permissions', 'status'];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public function getUser()
    {
        return $this->hasOne(User::class,'id','id_user');
    }



}
