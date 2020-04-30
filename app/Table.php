<?php

namespace App;

use DB;

class Table
{

    public static function TableList()
    {

        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);
        foreach ($tables as $table){
            $nameTable = strstr($table, 'f_');
            if ($nameTable){
                $tablesClear[] = $nameTable;
            }
        }

        return $tablesClear;
    }

    public static function Query($table)
    {
        $fields = DB::getSchemaBuilder()->getColumnListing($table);
        $values = DB::table($table)->get();
        return ['fields' => $fields, 'values' => $values];
    }
}

