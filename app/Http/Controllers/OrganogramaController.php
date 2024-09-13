<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganogramaController extends Controller
{
   


   public function index(){
   	  //$secretarias = Secretaria::all(); 
      return view('organograma');
   }


}
