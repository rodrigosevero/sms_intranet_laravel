<?php

namespace App\Repositories\UnidadeSaude;
use App\UnidadeSaude;

class UnidadeSaudeRepository implements UnidadeSaudeInterface
{


	protected $unidadesaude;
    
    public function __construct(UnidadeSaude $unidadesaude)
    {
        $this->unidadesaude = $unidadesaude;
    }



	public function listAll($unidade)
	{
	    return  $unidadessaude = UnidadeSaude::where('status_id', '1')->whereNotNull('latitude')->whereNotNull('longitude')->where('nome', 'ILIKE', '%'. $unidade.'%')
	    	->orWhere('nome2', 'ILIKE', '%'. $unidade.'%')
	    	->orWhere('nome3', 'ILIKE', '%'. $unidade.'%')
	    	->orderBy('id', 'desc')->with('tipounidade')->paginate(12);
	}


	public function listTelefone()
	{
	    return  $unidadessaude = UnidadeSaude::where('status_id', '1')->whereNotNull('telefone')->orderBy('id', 'desc')->with('tipounidade')->get();
	}


}