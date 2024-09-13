<?php

namespace App\Http\Controllers\admin;

use App\Comunicado;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComunicadoAdminController extends Controller
{


    public function index()
    {
        $comunicados = Comunicado::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.comunicados.index', compact('comunicados'), array('user' => Auth::user()));
    }

  

    public function create()
    {
      	$status = Statu::all();
        return view('admin.comunicados.criar', compact('status'), array('user' => Auth::user()));
    }

   

    public function store(Request $request)
    {	
        request()->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        $comunicado = new Comunicado;
        $comunicado->titulo = $request->input('titulo');
        $comunicado->texto = $request->input('texto');
        $comunicado->user_id = Auth::user()->id;
        $comunicado->status_id = $request->input('status_id');
        $comunicado->save();

        return redirect()->route('admin.comunicados.index')->with('status', Lang::get('messages.success_saved'));
    }

   


    public function edit($id)
    {
        $comunicado = Comunicado::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        return view('admin.comunicados.editar', compact('comunicado', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        $comunicado = Comunicado::find($id);

        $comunicado->titulo = $request->input('titulo');
        $comunicado->texto = $request->input('texto');
        $comunicado->user_id = Auth::user()->id;
        $comunicado->status_id = $request->input('status_id');
        $comunicado->save();

        return redirect()->route('admin.comunicados.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $comunicado = Comunicado::findOrFail($id);
        $comunicado->delete();
        return redirect()->route('admin.comunicados.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
