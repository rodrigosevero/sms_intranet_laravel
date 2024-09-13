<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sistema;
use App\Documentacao;
use App\Repositories\Sistema\SistemaInterface as SistemaInterface;
use App\Repositories\TipoDocumentacao\TipoDocumentacaoInterface as TipoDocumentacaoInterface;
use App\Repositories\Documentacao\DocumentacaoInterface as DocumentacaoInterface;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class SistemaController extends Controller
{
   


	public function __construct(
        ComunicadoInterface $comunicado,
        EventoInterface $evento,
        SistemaInterface $sistema,
        DocumentacaoInterface $documentacao,
        TipoDocumentacaoInterface $tipodocumentacao,
        UnidadeSaudeInterface $unidadesaude)
	  {
       $this->sistema = $sistema;
       $this->documentacao = $documentacao;      
       $this->tipodocumentacao = $tipodocumentacao;
	     $this->comunicado = $comunicado;
	     $this->evento = $evento;
       $this->unidadesaude = $unidadesaude;
	  }


   public function all(){
      $sistemas = $this->sistema->listAll();
      $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();
      return view('sistemas', compact('sistemas', 'unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



   public function filter($id){

    	$sistema = Sistema::findOrFail($id);
      $documentacoes = $this->documentacao->listAll($id);
      $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();
      $unidadessaude = $this->unidadesaude->listTelefone();
      return view('sistema', compact('sistema', 'unidadessaude', 'documentacoes', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }


}
