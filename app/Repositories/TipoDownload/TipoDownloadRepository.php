<?php

namespace App\Repositories\TipoDownload;
use App\TipoDownload;

class TipoDownloadRepository implements TipoDownloadInterface
{


	protected $tipodownload;
    
    public function __construct(TipoDownload $tipodownload)
    {
        $this->tipodownload = $tipodownload;
    }



	public function listAll()
	{
	    return $tipodownload = TipoDownload::where('status_id', '1')->orderBy('id', 'asc')->take(3)->get(); 
	}





}