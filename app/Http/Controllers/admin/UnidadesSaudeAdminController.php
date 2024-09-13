<?php

namespace App\Http\Controllers\admin;

use App\UnidadeSaude;
use App\TipoUnidade;
use App\RegionalUnidade;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnidadesSaudeAdminController extends Controller
{


    public function index()
    {
        $unidades_saude = UnidadeSaude::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.unidades-de-saude.index', compact('unidades_saude'), array('user' => Auth::user()));
    }


    public function create()
    {
      	$status = Statu::all();
        $tipos_unidade = TipoUnidade::all();
        $regionals_unidade = RegionalUnidade::all();

        return view('admin.unidades-de-saude.criar', compact('status', 'tipos_unidade', 'regionals_unidade'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'nome' => 'required|string|max:255',
            'regionalunidade' => 'required|int',
            'tipounidade' => 'required|int',
            'status_id' => 'required|int',
        ]);


        //checa se existe foto
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('/storage/unidades/' . $filename) );

            $unidade_saude->foto = $filename;
        }
        
        $unidade_saude = new UnidadeSaude;
        $unidade_saude->nome = $request->input('nome');
        $unidade_saude->nome2 = $request->input('nome2');
        $unidade_saude->nome3 = $request->input('nome3');
        $unidade_saude->foto_google = $request->input('foto_google');
        $unidade_saude->endereco = $request->input('endereco');
        $unidade_saude->telefone = $request->input('telefone');
        $unidade_saude->latitude = $request->input('latitude');
        $unidade_saude->longitude = $request->input('longitude');
        $unidade_saude->tipounidade_id = $request->input('tipounidade');
        $unidade_saude->regionalunidade_id = $request->input('regionalunidade');
        $unidade_saude->esus = $request->input('esus');
        $unidade_saude->status_id = $request->input('status_id');
        $unidade_saude->save();
        return redirect()->route('admin.unidades-de-saude.index')->with('status', Lang::get('messages.success_saved'));
    }


    public function edit($id)
    {
        $unidade_saude = UnidadeSaude::find($id); //Find id user
        $tipos_unidade = TipoUnidade::all();
        $regionals_unidade = RegionalUnidade::all();
        $status = Statu::all(); //Get all from Status
        return view('admin.unidades-de-saude.editar', compact('unidade_saude', 'tipos_unidade', 'regionals_unidade', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'nome' => 'required|string|max:255',
            'regionalunidade' => 'required|int',
            'tipounidade' => 'required|int',
            'status_id' => 'required|int',
        ]);

        $unidade_saude = UnidadeSaude::find($id);

        //checa se existe foto
        if($request->hasFile('foto')){

            File::delete(public_path('/storage/unidades/' . $unidade_saude->foto )); 

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            //Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatar/' . $filename ) );
            Image::make($foto)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save( public_path('/storage/unidades/' . $filename) );
            $unidade_saude->foto = $filename;
        }


        $unidade_saude->nome = $request->input('nome');
        $unidade_saude->nome2 = $request->input('nome2');
        $unidade_saude->nome3 = $request->input('nome3');
        $unidade_saude->foto_google = $request->input('foto_google');
        $unidade_saude->endereco = $request->input('endereco');
        $unidade_saude->telefone = $request->input('telefone');
        $unidade_saude->latitude = $request->input('latitude');
        $unidade_saude->longitude = $request->input('longitude');
        $unidade_saude->tipounidade_id = $request->input('tipounidade');
        $unidade_saude->regionalunidade_id = $request->input('regionalunidade');
        $unidade_saude->esus = $request->input('esus');
        $unidade_saude->status_id = $request->input('status_id');
        $unidade_saude->save();


        return redirect()->route('admin.unidades-de-saude.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $unidade_saude = UnidadeSaude::findOrFail($id);
        if($unidade_saude->foto){
            File::delete(public_path('/storage/unidades/' . $unidade_saude->foto )); //unlink 
        }
        $unidade_saude->delete();
        return redirect()->route('admin.unidades-de-saude.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
