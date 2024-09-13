<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Download;
use App\TipoDownload;
use App\Repositories\TipoDownload\TipoDownloadInterface as TipoDownloadInterface;
use App\Repositories\Download\DownloadInterface as DownloadInterface;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class DownloadController extends Controller
{
   

   	public function __construct(
        TipoDownloadInterface $tipodownload,
        DownloadInterface $download,
        ComunicadoInterface $comunicado,
        EventoInterface $evento,
        UnidadeSaudeInterface $unidadesaude)
	  {
      $this->tipodownload = $tipodownload;
      $this->download = $download;
      $this->comunicado = $comunicado;
      $this->evento = $evento;
      $this->unidadesaude = $unidadesaude;
	  }


   public function all(){

      $tiposdownloads = $this->tipodownload->listAll();
      $downloads = $this->download->listAll();
      $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();

      return view('downloads', compact('tiposdownloads', 'downloads', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }




   public function filter($id){

      $tiposdownloads = $this->tipodownload->listAll();
      $downloads = $this->download->listCategory($id);
      $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();

      return view('downloads', compact('tiposdownloads', 'downloads', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }




}
