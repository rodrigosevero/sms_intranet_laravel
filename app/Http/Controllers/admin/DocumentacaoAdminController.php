<?php

namespace App\Http\Controllers\admin;

use App\Documentacao;
use App\Statu;
use App\TipoDocumentacao;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentacaoAdminController extends Controller
{


    // public function index()
    // {
    //     $sistemas = Sistema::orderBy('id', 'desc')->with('statu')->get();
    //     return view('admin.sistemas.index', compact('sistemas'), array('user' => Auth::user()));
    // }


    // public function create()
    // {
    //   	$status = Statu::all();
    //     return view('admin.sistemas.criar', compact('status'), array('user' => Auth::user()));
    // }


    public function store(Request $request)
    {	
        request()->validate([
            'titulo' => 'required|string|max:255',
            'tipo_documentacao' => 'required|int',
            'arquivo' => 'required|file|mimes:doc,pdf,docx|max:1110000',
            'video' => 'required|string|max:255',
            'sistema_id' => 'required|int',
            'status_id' => 'required|int',
        ]);

        //checa se existe arquivo
        if($request->hasFile('arquivo')){
               $request->file('arquivo')->store('/public/sistemas/');
               $arquivo = $request->file('arquivo')->hashName();
        }

        $sistema_id = $request->input('sistema_id');

        $documentacao = new Documentacao;
        $documentacao->titulo = $request->input('titulo');
        $documentacao->arquivo = $arquivo;
        $documentacao->video = $request->input('video');
        $documentacao->sistemas_id = $sistema_id;
        $documentacao->tipo_documentacoes_id = $request->input('tipo_documentacao');
        $documentacao->user_id = Auth::user()->id;
        $documentacao->status_id = $request->input('status_id');
        $documentacao->save();
        //current inserted id 
       
        return redirect('admin/sistemas/'.$sistema_id.'/edit')->with('status', Lang::get('messages.success_saved'));
    }



    // public function edit($id)
    // {
    //     $sistema = Sistema::find($id); //Find id user
    //     $status = Statu::all(); //Get all from Status
    //     $tipo_documentacoes = TipoDocumentacao::orderBy('id', 'desc')->get();
    //     return view('admin.sistemas.editar', compact('sistema', 'tipo_documentacoes', 'status'), array('user' => Auth::user()));
    // }



    // public function update(Request $request, $id)
    // {
    //     request()->validate([
    //         'nome' => 'required|string|max:255',
    //         'descricao' => 'required|string|min:10',
    //         'foto' => 'mimes:jpeg,jpg|max:2000',
    //         'link' => 'required|string|min:10',
    //         'status_id' => 'required|int',
    //     ]);

    //     $sistema = Sistema::find($id);

    //     if($request->hasFile('foto') and $sistema->foto){

    //         File::delete(public_path('/storage/sistemas/' . $sistema->foto )); 

    //         $foto = $request->file('foto');
    //         $filename = time() . '.' . $foto->getClientOriginalExtension();
    //         //Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatar/' . $filename ) );
    //         Image::make($foto)->resize(800, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save( public_path('/storage/sistemas/' . $filename) );
    //         $sistema->foto = $filename;
    //     }

    //     $sistema->nome = $request->input('nome');
    //     $sistema->descricao = $request->input('descricao');
    //     $sistema->link = $request->input('link');
    //     $sistema->documentacao = 'teste';
    //     $sistema->user_id = Auth::user()->id;
    //     $sistema->status_id = $request->input('status_id');
    //     $sistema->save();
    //     return redirect()->route('admin.sistemas.index')->with('status', Lang::get('messages.success_saved'));
    // }

  

    public function destroy($id)
    {
        $documentacao = Documentacao::findOrFail($id);
        if($documentacao->arquivo){
             File::delete(public_path('/storage/sistemas/' . $documentacao->arquivo )); //unlink 
        }
        if($documentacao->video){
             File::delete(public_path('/storage/sistemas/' . $documentacao->video )); //unlink 
        }
        $documentacao->delete();
        return redirect()->route('admin.sistemas.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
