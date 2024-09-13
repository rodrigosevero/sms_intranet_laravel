<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Comunicado;
use App\Evento;
use App\Repositories\Noticia\NoticiaInterface as NoticiaInterface;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class NoticiaController extends Controller
{
   

  private $url_api;

  public function __construct(
    NoticiaInterface $noticia, 
    ComunicadoInterface $comunicado,
    EventoInterface $evento,
    UnidadeSaudeInterface $unidadesaude)
  {
    $this->noticia = $noticia;
    $this->comunicado = $comunicado;
    $this->evento = $evento;
    $this->unidadesaude = $unidadesaude;
    $this->url_api = "http://201.24.3.67:8080/portal/noticia/"; //Define default api url
  }


   public function index(){
    $noticias = $this->noticia->listAll();
    $comunicados_sidemenu = $this->comunicado->listInicio();
    $eventos_sidemenu = $this->evento->listInicio();
    $unidadessaude = $this->unidadesaude->listTelefone();

    return view('noticias', compact('noticias', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



   public function show($id){
      $noticia = $this->noticia->show($id);
      $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();
      return view('noticia', compact('noticia', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }

}
