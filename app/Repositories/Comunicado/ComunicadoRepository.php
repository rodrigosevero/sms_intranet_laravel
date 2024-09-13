<?php

namespace App\Repositories\Comunicado;
use App\Comunicado;

class ComunicadoRepository implements ComunicadoInterface
{


	protected $comunicado;
    
    public function __construct(Comunicado $comunicado)
    {
        $this->comunicado = $comunicado;
    }



	public function listInicio()
	{
	    return  $comunicado = Comunicado::where('status_id', '1')->orderBy('id', 'desc')->take(3)->get(); 
	}


	public function listAll()
	{
	   return  $comunicado = Comunicado::where('status_id', '1')->orderBy('id', 'desc')->paginate(5);
	}



}