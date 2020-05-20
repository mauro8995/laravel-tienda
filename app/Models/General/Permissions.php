<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;


class Permissions extends Model
{
    //

    public static function getTableName()
    {
        return with(new static)->getTable();
    }


}
