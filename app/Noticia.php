<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{

	protected $table = 'intranet_noticias';

    protected $fillable = [
    	'titulo', 'descricao', 'foto', 'texto', 'user_id', 'status_id',   	
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }




    

}
