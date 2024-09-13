<?php

namespace App\Repositories\Sistema;
use App\Sistema;
use Carbon\Carbon;

class SistemaRepository implements SistemaInterface
{


	protected $sistema;
    
    public function __construct(Sistema $sistema)
    {
        $this->sistema = $sistema;
    }



	public function listInicio()
	{	
		$sistema = Sistema::where('status_id', '1')->orderBy('id')->get();
		return $sistema; 
	}


	



	public function listAll()
	{	
		return $sistema = Sistema::where('status_id', '1')->orderBy('id', 'desc')->paginate(15);
	}


	public function show($id)
	{	
		return $sistema = Sistema::where('status_id', '1')->orderBy('id', 'desc')->paginate(5);
	}



}