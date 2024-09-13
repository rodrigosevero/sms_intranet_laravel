<?php

namespace App\Http\Controllers\admin;

use App\Download;
use App\TipoDownload;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadAdminController extends Controller
{


    public function index()
    {
        $downloads = Download::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.downloads.index', compact('downloads'), array('user' => Auth::user()));
    }


    public function create()
    {
      	$status = Statu::all();
        $tipo_downloads = TipoDownload::all();
        return view('admin.downloads.criar', compact('status', 'tipo_downloads'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'titulo' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:doc,docx,pdf,zip,rar,xlsx|max:10000',
            'tipo_download' => 'required|int',
            'status_id' => 'required|int',
        ]);


        //checa se existe arquivo
        if($request->hasFile('arquivo')){
               $request->file('arquivo')->store('/public/downloads/');
               $arquivo = $request->file('arquivo')->hashName();
        }else{
              // $filename = 'default';
        }



        $download = new Download;
        $download->titulo = $request->input('titulo');
        $download->arquivo = $arquivo;
        $download->tipo_downloads_id = $request->input('tipo_download');
        $download->user_id = Auth::user()->id;
        $download->status_id = $request->input('status_id');
        $download->save();
        return redirect()->route('admin.downloads.index')->with('status', Lang::get('messages.success_saved'));
    }



    public function edit($id)
    {
        $download = Download::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        $tipo_downloads = TipoDownload::all(); //Get all from Status
        return view('admin.downloads.editar', compact('download', 'tipo_downloads', 'status'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required|string|max:255',
            'tipo_download' => 'required|int',
            'status_id' => 'required|int',
        ]);

        $download = Download::find($id);

        if($request->hasFile('arquivo')){
            File::delete(public_path('/storage/downloads/' . $download->arquivo )); 
            $request->file('arquivo')->store('/public/downloads/');
            $arquivo = $request->file('arquivo')->hashName();
        }

        $download->titulo = $request->input('titulo');
        $download->tipo_downloads_id = $request->input('tipo_download');
        $download->user_id = Auth::user()->id;
        $download->status_id = $request->input('status_id');
        $download->save();
        return redirect()->route('admin.downloads.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $download = Download::findOrFail($id);
        if($download->arquivo){
             File::delete(public_path('/storage/downloads/' . $download->arquivo )); //unlink 
        }
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
