<?php

namespace App\Repositories\Download;
use App\Download;

class DownloadRepository implements DownloadInterface
{


	protected $download;
    
    public function __construct(Download $download)
    {
        $this->download = $download;
    }



	public function listAll()
	{	
	    return $download = Download::where('status_id', '1')->orderBy('id', 'desc')->paginate(5);
	}


	public function listCategory($id)
	{	
	    $download = Download::where('tipo_downloads_id', $id)->orderBy('id', 'desc')->paginate(5);
	    return $download;
	}



}