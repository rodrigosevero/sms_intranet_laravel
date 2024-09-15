<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UnidadeSaude;
use App\RegionalUnidade;
use App\Repositories\Comunicado\ComunicadoInterface as ComunicadoInterface;
use App\Repositories\Evento\EventoInterface as EventoInterface;
use App\Repositories\UnidadeSaude\UnidadeSaudeInterface as UnidadeSaudeInterface;

class UnidadeSaudeController extends Controller
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


   public function index_lista(Request $request){

      $unidade = $request->input('unidade');


      $unidadessaude = $this->unidadesaude->listAll($unidade);
   	  $comunicados_sidemenu = $this->comunicado->listInicio();
      $eventos_sidemenu = $this->evento->listInicio();

      return view('lista-unidades', compact('unidadessaude', 'comunicados_sidemenu', 'eventos_sidemenu'));
   }



   public function getAllUnidades(Request $request){


                $termo = $request->input('unidade');
                $termo2 = $request->input('regional');

                $unidades = DB::table('unidade_saudes')
               ->select('unidade_saudes.id AS unidade_id',
                  'unidade_saudes.nome AS unidade_nome',
                  'unidade_saudes.endereco AS unidade_endereco',
                  'unidade_saudes.telefone AS unidade_telefone',
                  'unidade_saudes.foto AS unidade_foto',
                  'unidade_saudes.latitude AS unidade_latitude',
                  'unidade_saudes.longitude AS unidade_longitude',
                  'tipo_unidades.nome AS unidade_tipo',
                  'tipo_unidades.icone AS unidade_icone',
                  'regional_unidades.nome AS unidade_regional')
                  ->join('tipo_unidades', 'tipo_unidades.id', '=', 'unidade_saudes.tipounidade_id')
                  ->join('regional_unidades', 'regional_unidades.id', '=', 'unidade_saudes.regionalunidade_id')
                  ->where('unidade_saudes.status_id', '=', '1')
                  ->whereNotNull('unidade_saudes.latitude')
                  ->whereNotNull('unidade_saudes.longitude');
                  if($termo){
                    $unidades->where('unidade_saudes.nome', 'LIKE',  '%' . $termo . '%')
                    ->orWhere('nome2', 'LIKE', '%'. $termo.'%')
                    ->orWhere('nome3', 'LIKE', '%'. $termo.'%');
                  }
                  if($termo2){
                    $unidades->where('unidade_saudes.regionalunidade_id', '=', ''.$termo2.'');
                  }
                  $unidades->orderBy('unidade_saudes.nome', 'ASC');
                  $unidades = $unidades->get();

                  $uniCount = $unidades->count();
                  return (string) 'var data = { "count": '.$uniCount.',
                  "unidade": '.$unidades.'}';
   }



   public function index_mapa(Request $request){
      $termo = $request->input('unidade');
      $termo2 = $request->input('regional');
      $unidade_regionais = RegionalUnidade::All();
      return view('mapa-unidades', compact('termo', 'termo2', 'unidade_regionais'));
   }

}
