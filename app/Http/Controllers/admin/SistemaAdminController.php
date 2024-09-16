<?php

namespace App\Http\Controllers\admin;

use App\Sistema;
use App\Statu;
use App\TipoDocumentacao;
use App\Documentacao;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SistemaAdminController extends Controller
{


    public function index()
    {
        $sistemas = Sistema::orderBy('id', 'desc')->with('statu')->get();
       
        return view('admin.sistemas.index', compact('sistemas'), array('user' => Auth::user()));
    }


    public function create()
    {
      	$status = Statu::all();
        // dd($status);
        return view('admin.sistemas.criar', compact('status'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|min:10',
            'foto' => 'mimes:jpeg,jpg,png|max:2000',
            'link' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        //checa se existe foto
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('/storage/sistemas/' . $filename) );
        }else{
            $filename = 'default.jpg';
        }

        $sistema = new Sistema;
        $sistema->nome = $request->input('nome');
        $sistema->descricao = $request->input('descricao');
        $sistema->foto = $filename;
        $sistema->link = $request->input('link');
        $sistema->user_id = Auth::user()->id;
        $sistema->status_id = $request->input('status_id');
        $sistema->save();
        //current inserted id 
        $id = $sistema->id;
        return redirect('admin/sistemas/'.$id.'/edit')->with('status', Lang::get('messages.success_saved'));
    }



    public function edit($id)
    {
        $sistema = Sistema::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        $tipo_documentacoes = TipoDocumentacao::orderBy('id', 'desc')->get();
        //$documentacoes = Documentacao::orderBy('id', 'desc')->get();

        //$documentacoes = Documentacao::where('tipo_documentacoes_id', 9)->get();
        $documentacoes = Documentacao::where('sistemas_id', '=', $id)->get();

        return view('admin.sistemas.editar', compact('sistema', 'tipo_documentacoes', 'documentacoes', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|min:10',
            'foto' => 'mimes:jpeg,jpg,png|max:2000',
            'link' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        $sistema = Sistema::find($id);
        
        if($request->hasFile('foto') and $sistema->foto){

            File::delete(public_path('/storage/sistemas/' . $sistema->foto )); 

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
           
            Image::make($foto)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('/storage/sistemas/' . $filename) );
            $sistema->foto = $filename;
            
        }

        $sistema->nome = $request->input('nome');
        $sistema->descricao = $request->input('descricao');
        $sistema->link = $request->input('link');
        $sistema->user_id = Auth::user()->id;
        $sistema->status_id = $request->input('status_id');
        $sistema->save();
        return redirect()->route('admin.sistemas.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {   

        $documentacoes = Documentacao::where('sistemas_id', '=', $id)->get();

       foreach ($documentacoes as $documentacao) {
            Storage::delete('/public/sistemas/' . $documentacao->arquivo);
            $documentacoes = Documentacao::findOrFail($documentacao->id);
            $documentacoes->delete();
       }
        
        $sistema = Sistema::findOrFail($id);
        if($sistema->foto){
            File::delete(public_path('/storage/sistemas/' . $sistema->foto )); //unlink 
        }
        $sistema->delete();

        return redirect()->route('admin.sistemas.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
