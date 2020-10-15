<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Auxilio;

class AuxilioController extends Controller
{
 
    public function index(Auxilio $model)
    {
        return view('auxilios.index', ['datos' => $model->orderBy('id', 'desc')->paginate(15)]);
    } 
   
 
    public function update(Request $request, Auxilio $auxilio)
    { 
    	echo $auxilio->update($request->all());
    }
 

}
