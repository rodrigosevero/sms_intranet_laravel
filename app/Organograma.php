<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organograma extends Model
{

	protected $table = 'intranet_organogramas';

    protected $fillable = [
    	'texto',
    ];
}
