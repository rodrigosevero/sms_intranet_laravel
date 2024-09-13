<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    
    protected $table = 'downloads';

    protected $fillable = [
    	'titulo', 'arquivo', 'tipo_downloads_id', 'user_id', 'status_id',   	
    ];

    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function tipodownload(){
    	return $this->belongsTo('App\TipoDownload', 'tipo_downloads_id');
    }
}
