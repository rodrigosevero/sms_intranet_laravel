<?php

namespace App\Http\Controllers\admin;

use App\Organograma;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganogramaAdminController extends Controller
{


    public function index()
    {
        $organogramas = Organograma::all();
        return view('admin.organograma.index', compact('organogramas'), array('user' => Auth::user()));
    }



    public function edit($id)
    {
        $organograma = Organograma::find($id); //Find
        return view('admin.organograma.editar', compact('organograma'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'texto' => 'required|string|min:10',
        ]);

        $organograma = Organograma::find($id);
        $organograma->texto = $request->input('texto');
        $organograma->save();
        return redirect()->route('admin.organograma.index')->with('status', Lang::get('messages.success_saved'));
    }

}
