<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\TableExport;
use App\Ahorro;


class AhorroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ahorro $model)
    {
        return view('ahorro.index', ['ahorros' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ahorro  $ahorro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ahorro $ahorro)
    {        
        echo $ahorro->update($request->all());
    }

    public function export($table)
    {
        return Excel::download(new TableExport($table), $table.'.xlsx');
    }

}
