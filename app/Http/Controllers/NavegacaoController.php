<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class NavegacaoController extends Controller
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


   public function acessibilidade(){

    $comunicados_sidemenu = $this->comunicado->listInicio();
    $eventos_sidemenu = $this->evento->listInicio();
    $unidadessaude = $this->unidadesaude->listTelefone();

      return view('acessibilidade', compact('unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



   public function mapa_do_site(){

    $comunicados_sidemenu = $this->comunicado->listInicio();
    $eventos_sidemenu = $this->evento->listInicio();
    $unidadessaude = $this->unidadesaude->listTelefone();
    
      return view('mapa-do-site', compact('unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



}
