<?php

namespace App\Repositories\TipoDocumentacao;
use App\TipoDocumentacao;

class TipoDocumentacaoRepository implements TipoDocumentacaoInterface
{


	protected $tipodocumentacao;
    
    public function __construct(TipoDocumentacao $tipodocumentacao)
    {
        $this->tipodocumentacao = $tipodocumentacao;
    }



	public function listAll()
	{	
	    return $tipodocumentacao = TipoDocumentacao::orderBy('id', 'desc')->paginate(5);
	}





}