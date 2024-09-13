<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Statu;
use Auth;
use Image;
use File;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioAdminController extends Controller
{


    public function index()
    {
        $usuarios = User::all()->where('id', '<>', Auth::user()->id); //Select all where differs from current user
        return view('admin.usuarios.index', compact('usuarios'), array('user' => Auth::user()) );
    }

  

    public function create()
    {
        $usuarios = new User; //Inst new user
        return view('admin.usuarios.criar', compact('usuarios'), array('user' => Auth::user()));
    }

   

    public function store(Request $request)
    {	
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email'); 
        $usuario->password = bcrypt($request->input('password'));
        $usuario->ac_intranet = $request->has('ac_intranet'); 
        $usuario->ac_helpdesk = $request->has('ac_helpdesk'); 
        $usuario->ac_reqobra = $request->has('ac_reqobra'); 
        $usuario->save();    

        return redirect()->route('admin.usuarios.index')->with('status', Lang::get('messages.success_saved'));
    }

   


    public function edit($id)
    {
        // check if logged user is not acessing his id
        if (Auth::user()->id == $id) {
            # code... 
            abort(401, 'Unauthorized action.');
        }
        $usuario = User::find($id); //Find id user

        return view('admin.usuarios.editar', compact('usuario'), array('user' => Auth::user()));
    }



    public function update(Request $request, $id)
    {
       
         request()->validate([
            'name' => 'required|string|max:255',
        ]);
        //User::find($id)->update($request->all()); -older method
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->ac_intranet = $request->has('ac_intranet'); 
        $user->ac_helpdesk = $request->has('ac_helpdesk'); 
        $user->ac_reqobra = $request->has('ac_reqobra'); 
        $user->save();

        return redirect()->route('admin.usuarios.index')->with('status', Lang::get('messages.success_saved'));
    }

  

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('status', Lang::get('messages.success_deleted'));
    }

}
