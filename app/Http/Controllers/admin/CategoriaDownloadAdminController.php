<?php

namespace App\Http\Controllers\admin;

use App\TipoDownload;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaDownloadAdminController extends Controller
{

    public function index()
    {
        $tipo_downloads = TipoDownload::orderBy('id', 'desc')->with('statu')->get();
        return view('admin.categoria-downloads.index', compact('tipo_downloads'), array('user' => Auth::user()));
    }


    public function create()
    {
      	$status = Statu::all();
        return view('admin.categoria-downloads.criar', compact('status'), array('user' => Auth::user()));
    }


    public function store(Request $request)
    {	
        request()->validate([
            'nome' => 'required|string|max:255',
            'status_id' => 'required|int',
        ]);
        $tipo_download = new TipoDownload;
        $tipo_download->nome = $request->input('nome');
        $tipo_download->user_id = Auth::user()->id;
        $tipo_download->status_id = $request->input('status_id');
        $tipo_download->save();
        return redirect()->route('admin.categoria-downloads.index')->with('status', Lang::get('messages.success_saved'));
    }


    public function edit($id)
    {
        $tipo_download = TipoDownload::find($id); //Find id user
        $status = Statu::all(); //Get all from Status
        return view('admin.categoria-downloads.editar', compact('tipo_download', 'status'), array('user' => Auth::user()));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nome' => 'required|string|max:255',
            'status_id' => 'required|int',
        ]);

        $tipo_download = TipoDownload::find($id);
        $tipo_download->nome = $request->input('nome');
        $tipo_download->user_id = Auth::user()->id;
        $tipo_download->status_id = $request->input('status_id');
        $tipo_download->save();

        return redirect()->route('admin.categoria-downloads.index')->with('status', Lang::get('messages.success_saved'));
    }


    public function destroy($id)
    {
        $tipo_download = TipoDownload::findOrFail($id);
        $tipo_download->delete();
        return redirect()->route('admin.categoria-downloads.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
