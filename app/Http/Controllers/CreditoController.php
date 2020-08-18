<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Credito;

class CreditoController extends Controller
{
 
    public function index(Credito $model)
    {
        return view('credito.index', ['datos' => $model->orderBy('id', 'desc')->paginate(15)]);
    } 
   
 
    public function update(Request $request, Credito $credito)
    { 
    	echo $credito->update($request->all());
    }
 

}
