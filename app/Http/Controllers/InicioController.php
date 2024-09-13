<?php

namespace App\Http\Controllers;

use App\Sistema;
use App\Noticia;
use App\Comunicado;
use App\Statu;
use App\Evento;
use Illuminate\Http\Request;
use App\Repositories\Noticia\NoticiaInterface as NoticiaInterface;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\Sistema\SistemaInterface as SistemaInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class InicioController extends Controller
{


	public function __construct(
		NoticiaInterface $noticia, 
		ComunicadoInterface $comunicado,
		EventoInterface $evento,
		SistemaInterface $sistema,
		UnidadeSaudeInterface $unidadesaude)
	{
	  $this->noticia = $noticia;
	  $this->comunicado = $comunicado;
	  $this->evento = $evento;
	  $this->sistema = $sistema;
	  $this->unidadesaude = $unidadesaude;
	}



   public function index(){

   	  //$noticias = $this->noticia->listInicio();
	  $comunicados_sidemenu = $this->comunicado->listInicio();
	  $eventos_sidemenu = $this->evento->listInicio();
	  $unidadessaude = $this->unidadesaude->listTelefone();
	  $sistemas = $this->sistema->listAll();

      return view('inicio', compact('unidadessaude',  'comunicados_sidemenu', 'eventos_sidemenu', 'sistemas'));
   }


}
