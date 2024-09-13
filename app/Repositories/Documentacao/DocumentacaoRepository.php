<?php

namespace App\Repositories\Documentacao;
use App\Documentacao;

class DocumentacaoRepository implements DocumentacaoInterface
{


	protected $documentacao;
    
    public function __construct(Documentacao $documentacao)
    {
        $this->documentacao = $documentacao;
    }



	public function listAll($id)
	{	
	    return $documentacao = Documentacao::where('sistemas_id', $id)->orderBy('id', 'desc')->paginate(5);
	}





}