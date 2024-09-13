<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comunicado;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class ComunicadoController extends Controller
{
   
	public function __construct(
	    ComunicadoInterface $comunicado,
	    EventoInterface $evento,
       UnidadeSaudeInterface $unidadesaude)
	  {
	    $this->comunicado = $comunicado;
	    $this->evento = $evento;
       $this->unidadesaude = $unidadesaude;
	  }



   public function index(){
   	  //$secretarias = Secretaria::all(); 

   	  $comunicados = $this->comunicado->listAll();
   	  $comunicados_sidemenu = $this->comunicado->listInicio();
        $eventos_sidemenu = $this->evento->listInicio();
        $unidadessaude = $this->unidadesaude->listTelefone();

      return view('comunicados', compact('comunicados', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



   public function show($id){

   	  $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();
   	  $comunicado = Comunicado::findOrFail($id);
      return view('comunicado', compact('comunicado', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }

}
