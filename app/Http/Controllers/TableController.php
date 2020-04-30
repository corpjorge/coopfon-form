<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

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

}
