<?php

namespace App\Repositories\Download;



interface DownloadInterface {


    /**
     * Get's a post by it's ID
     *
     * @param int
     */
	public function listAll();

	public function listCategory($id);

}