<?php

namespace App\Repositories\Noticia;



interface NoticiaInterface {


    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function listInicio();
    
	public function listAll();

	public function show($id);

}