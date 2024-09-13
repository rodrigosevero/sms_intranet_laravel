<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidade extends Model
{

	protected $table = 'intranet_tipo_unidades';
	
    protected $fillable = [
    	'nome', 'icone', 'status_id',
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function unidadesaude(){
        return $this->hasMany('App\UnidadeSaude');
    }
}
