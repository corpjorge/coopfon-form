<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TableExport;
use Illuminate\Http\Request;
use App\Table;

use DB;
class TableController extends Controller
{
    public function index()
    {
        $tables = Table::TableList();

        return view('table.index', [ 'tables' => $tables]);
    }

    public function show($table)
    {
        return view('table.show', compact('table'), Table::Query($table));
    }

    public function export($table)
    {
        return Excel::download(new TableExport($table), $table.'.xlsx');
    }

    public function update(Request $request, $table, $id)
    {
        foreach ($request->all() as $key => $value){
            if ($key != '_token'){
                $data = array(
                    $key => $value,
                );
            }
        }
        Table::UpdateTable($table, $id, $data);
    }

}
