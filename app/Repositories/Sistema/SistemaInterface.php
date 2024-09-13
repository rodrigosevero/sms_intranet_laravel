<?php

namespace App\Repositories\Sistema;



interface SistemaInterface {


    /**
     * Get's a sistema by it's ID
     *
     * @param int
     */

    public function listInicio();

	public function listAll();

	public function show($id);
}