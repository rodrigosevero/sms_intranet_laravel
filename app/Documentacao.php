<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentacao extends Model
{


	protected $table = 'documentacoes';
	
    protected $fillable = [
    	'titulo', 'arquivo', 'video', 'sistemas_id', 'tipo_documentacoes_id', 'user_id', 'status_id',   	
    ];



    public function sistema(){
        return $this->belongsTo('App\Sistema', 'sistemas_id');
    }

    public function tipodocumentacao(){
        return $this->belongsTo('App\TipoDocumentacao', 'tipo_documentacoes_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    

}
