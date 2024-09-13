<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
 
    protected $table = 'comunicados';

    protected $fillable = [
    	'titulo', 'texto', 'user_id', 'status_id',   	
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
     public function user(){
    	return $this->belongsTo('App\User');
    }
}
