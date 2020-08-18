<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ahorro;

class AhorroController extends Controller
{
 
    public function index(Ahorro $model)
    {
        return view('ahorro.index', ['ahorros' => $model->orderBy('id', 'desc')->paginate(15)]);
    } 
 
    public function update(Request $request, Ahorro $ahorro)
    {        
        echo $ahorro->update($request->all());
    } 
 

}
