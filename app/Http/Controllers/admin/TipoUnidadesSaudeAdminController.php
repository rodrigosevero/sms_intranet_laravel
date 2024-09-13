<?php

namespace App\Http\Controllers\admin;

use App\TipoUnidade;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoUnidadesSaudeAdminController extends Controller
{

    public function index()
    {
        $tipo_unidades = TipoUnidade::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.categoria-unidades-de-saude.index', compact('tipo_unidades'), array('user' => Auth::user()));
    }


    public function create()
    {
      	$status = Statu::all();
        return view('admin.categoria-unidades-de-saude.criar', compact('status'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'nome' => 'required|string|max:255',
            'status_id' => 'required|int',
        ]);

        if($request->hasFile('icone')){
            $icone = $request->file('icone');
            $filename = time() . '.' . $icone->getClientOriginalExtension();
            Image::make($icone)->save( public_path('/storage/unidades/' . $filename) );
        }else{
            $filename = 'default.jpg';
        }


        $tipo_unidade = new TipoUnidade;
        $tipo_unidade->nome = $request->input('nome');
        $tipo_unidade->icone = $filename;
        $tipo_unidade->status_id = $request->input('status_id');
        $tipo_unidade->save();
        return redirect()->route('admin.categoria-unidades-de-saude.index')->with('status', Lang::get('messages.success_saved'));
    }


    public function edit($id)
    {
        $tipo_unidade = TipoUnidade::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        return view('admin.categoria-unidades-de-saude.editar', compact('tipo_unidade', 'status'), array('user' => Auth::user()));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nome' => 'required|string|max:255',
            'status_id' => 'required|int',
        ]);

        $tipo_unidade = TipoUnidade::find($id);

        if($request->hasFile('icone') and $tipo_unidade->icone){

            File::delete(public_path('/storage/unidades/' . $tipo_unidade->icone )); 

            $icone = $request->file('icone');
            $filename = time() . '.' . $icone->getClientOriginalExtension();
            Image::make($icone)->save( public_path('/storage/unidades/' . $filename) );
            $tipo_unidade->icone = $filename;
        }

        $tipo_unidade->nome = $request->input('nome');
        $tipo_unidade->status_id = $request->input('status_id');
        $tipo_unidade->save();

        return redirect()->route('admin.categoria-unidades-de-saude.index')->with('status', Lang::get('messages.success_saved'));
    }


    public function destroy($id)
    {
        $tipo_unidade = TipoUnidade::findOrFail($id);
        $tipo_unidade->delete();
        return redirect()->route('admin.categoria-unidades-de-saude.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
