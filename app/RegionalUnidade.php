<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionalUnidade extends Model
{
	//Define name manually
	protected $table = 'intranet_regional_unidades';
    
    protected $fillable = [
    	'nome'
    ];

    public function unidadesaude(){
    	return $this->hasMany('App\UnidadeSaude');
    }   
}
