<?php

namespace App\Repositories\Evento;
use App\Evento;

class EventoRepository implements EventoInterface
{


	protected $evento;
    
    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
    }



	public function listInicio()
	{
	    return $eventos = Evento::where('status_id', '1')->orderBy('data', 'asc')->take(3)->get(); 
	}


	public function listAll()
	{

	    return  $eventos = Evento::where('status_id', '1')->orderBy('data', 'asc')->paginate(5);
	}




}