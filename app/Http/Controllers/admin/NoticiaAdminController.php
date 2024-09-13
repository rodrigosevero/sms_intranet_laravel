<?php

namespace App\Http\Controllers\admin;

use App\Noticia;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticiaAdminController extends Controller
{


    public function index()
    {
        $noticias = Noticia::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.noticias.index', compact('noticias'), array('user' => Auth::user()));
    }

  

    public function create()
    {
      	$status = Statu::all();
        return view('admin.noticias.criar', compact('status'), array('user' => Auth::user()));
    }

   

    public function store(Request $request)
    {	
        request()->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'foto' => 'mimes:jpeg,jpg,png|max:2000',
            'texto' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        //checa se existe foto
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save( public_path('/storage/noticias/' . $filename) );
        }else{
            $filename = 'default';
        }

        $noticia = new Noticia;
        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->foto = $filename;
        $noticia->texto = $request->input('texto');
        $noticia->user_id = Auth::user()->id;
        $noticia->status_id = $request->input('status_id');
        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('status', Lang::get('messages.success_saved'));
    }

   


    public function edit($id)
    {
        $noticia = Noticia::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        return view('admin.noticias.editar', compact('noticia', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'foto' => 'mimes:jpeg,jpg|max:2000',
            'texto' => 'required|string|min:10',
            'status_id' => 'required|int',
        ]);

        $noticia = Noticia::find($id);

        if($request->hasFile('foto') and $noticia->foto){

            File::delete(public_path('/storage/noticias/' . $noticia->foto )); 

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            //Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatar/' . $filename ) );
            Image::make($foto)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save( public_path('/storage/noticias/' . $filename) );
            $noticia->foto = $filename;
        }

        $noticia->titulo = $request->input('titulo');
        $noticia->descricao = $request->input('descricao');
        $noticia->texto = $request->input('texto');
        $noticia->user_id = Auth::user()->id;
        $noticia->status_id = $request->input('status_id');
        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        if($noticia->foto){
             File::delete(public_path('/storage/' . $noticia->foto )); //unlink 
        }
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
