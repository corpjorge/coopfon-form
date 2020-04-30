<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class TableExport implements FromCollection
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table($this->table)->get();
    }
}
