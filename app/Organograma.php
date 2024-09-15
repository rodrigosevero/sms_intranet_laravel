<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organograma extends Model
{

	protected $table = 'organogramas';

    protected $fillable = [
    	'texto',
    ];
}
