<?php

namespace App\Repositories\Documentacao;



interface DocumentacaoInterface {


    /**
     * Get's a post by it's ID
     *
     * @param int
     */
	public function listAll($id);

}