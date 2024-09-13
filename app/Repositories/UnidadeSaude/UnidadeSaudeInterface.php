<?php

namespace App\Repositories\UnidadeSaude;



interface UnidadeSaudeInterface {


    /**
     * Get's a post by it's ID
     *
     * @param int
     */
	public function listAll($unidade);

	public function listTelefone();


}