<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    //
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
