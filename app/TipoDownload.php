<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDownload extends Model
{

    protected $table = 'tipo_downloads';

    protected $fillable = [
    	'nome', 'user_id', 'status_id',   	
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
 
    public function download(){
    	return $this->belongsTo('App\Download');
    }   
}
