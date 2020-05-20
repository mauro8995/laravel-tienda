<?php
namespace App\Clases\Frontend;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use stdClass;

class Input
{
    /* métodos y/o atributos */
    public function getTypeInput($model,array $col_name =[],$see_time_create = false )
    {

        if($model == null)
        {
            return [];
        }

        $table =  $model->getTableName();

        $type  = [//combercion de la base de datos
            "int8"=>"number",
            "int4"=>"number",
            "varchar"=>"text",
            "timestamp"=>"date",
            "text"=>"text",
            "bool"=>"checkbox",
        ];

        //consulta de la tabla esquema
        $squema = DB::select("SELECT * FROM INFORMATION_SCHEMA.COLUMNS where table_name = '$table'");


        foreach ($squema  as $key => $value) {
            if(!$see_time_create){
                if($value->column_name == "created_at"||$value->column_name == 'modified_by'
                || $value->column_name == 'created_by' || $value->column_name == 'updated_at')
                unset($squema[$key]);
            }

            $value->udt_name = $type[$value->udt_name];
        }
        return $squema;
    }



    function buscar( $objeto, $array ) {
        $arra = [];
        foreach ($objeto as $key => $value) {
            foreach ($array  as $key2 => $value2) {
                //dd($objeto);
                    if($value2->column_name == $key){

                        $c= DB::select("select * from $value2->foreign_table_name where ".
                        "$value2->foreign_column_name = $value;");
                        $o = new stdClass;
                        $o->data = $c[0];
                        $o->table = $value2->foreign_table_name;
                        $o->column_name = $value2->column_name;
                        array_push($arra,$o);
                    }
            }
        }
        return $arra;
    }

    function getDataAll($table,$query){
        $s =  $this->getTableRelation($table);
        $c= $query->toArray();
        $arr = [];
        foreach ($c as $key => $value) {
            $o = new stdClass;
            $o->relation = $this->buscar($value,$s);
            $o->principal = $value;
            array_push($arr,$o);
        }
        return $arr;
    }

    function getSquemaAll(){
        $relation = $this->getTableRelation("user_permissions");
        $a = [];
        foreach ($relation as $key => $value) {
            $value;
            $o = new stdClass;
            $o->table = $value->foreign_table_name;
            $o->squema = $this->getSquema($value->foreign_table_name);
            array_push($a,$o);
        }
        return $a;
    }


    function getTableRelation($table){
        return   DB::select("SELECT ".
        "tc.table_schema, ".
        "tc.constraint_name, ".
        "tc.table_name, ".
        "kcu.column_name, ".
        "ccu.table_schema AS foreign_table_schema, ".
        "ccu.table_name AS foreign_table_name, ".
        "ccu.column_name AS foreign_column_name  ".
    "FROM ".
        "information_schema.table_constraints AS tc ".
        "JOIN information_schema.key_column_usage AS kcu ".
            "ON tc.constraint_name = kcu.constraint_name ".
            "AND tc.table_schema = kcu.table_schema ".
        "JOIN information_schema.constraint_column_usage AS ccu ".
            "ON ccu.constraint_name = tc.constraint_name ".
            "AND ccu.table_schema = tc.table_schema ".
    "WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name='$table' ;");
    }

    function getSquema($table){
        return  DB::select("SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS where table_name = '$table'");
    }

    function getDataTable($tabla_local,$local_forena,$tabla_foranea,$llave_foranea){
        return DB::select("select * from $tabla_local ".
        "inner join $tabla_foranea on $tabla_foranea.$llave_foranea = $tabla_local.$local_forena ");
    }
}
