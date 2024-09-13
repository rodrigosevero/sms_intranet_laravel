<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class EventoController extends Controller
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
   	 
      $eventos = $this->evento->listAll();
   	$comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();

      return view('eventos', compact('eventos', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }


   public function show($id){
      $evento = Evento::findOrFail($id);
   	  $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();    
      return view('evento', compact('evento', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }

}
