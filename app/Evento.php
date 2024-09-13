<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{

	protected $table = 'eventos';

    protected $fillable = [
    	'titulo', 'texto', 'data', 'user_id', 'status_id',   	
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
     public function user(){
    	return $this->belongsTo('App\User');
    }


}
