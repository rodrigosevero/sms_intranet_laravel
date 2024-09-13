<?php

namespace App\Repositories\Comunicado;



interface ComunicadoInterface {


    /**
     * Get's a post by it's ID
     *
     * @param int
     */

    public function listInicio();

	public function listAll();


}