<?php

namespace App\Http\Controllers\admin;

use App\Evento;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventoAdminController extends Controller
{


    public function index()
    {
        $eventos = Evento::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.eventos.index', compact('eventos'), array('user' => Auth::user()));
    }

  

    public function create()
    {
      	$status = Statu::all();
        return view('admin.eventos.criar', compact('status'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string|min:10',
            'data' => 'required|string|min:8',
            'status_id' => 'required|int',
        ]);

        $evento = new Evento;
        $evento->titulo = $request->input('titulo');
        $evento->texto = $request->input('texto');
        $evento->data = $request->input('data');
        $evento->user_id = Auth::user()->id;
        $evento->status_id = $request->input('status_id');
        $evento->save();

        return redirect()->route('admin.eventos.index')->with('status', Lang::get('messages.success_saved'));
    }



    public function edit($id)
    {
        $evento = Evento::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        return view('admin.eventos.editar', compact('evento', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string|min:10',
            'data' => 'required|string|min:8',
            'status_id' => 'required|int',
        ]);

        $evento = Evento::find($id);

        $evento->titulo = $request->input('titulo');
        $evento->texto = $request->input('texto');
        $evento->data = $request->input('data');
        $evento->user_id = Auth::user()->id;
        $evento->status_id = $request->input('status_id');
        $evento->save();

        return redirect()->route('admin.eventos.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
