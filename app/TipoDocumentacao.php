<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumentacao extends Model
{
    
    protected $table = 'tipo_documentacoes';

    protected $fillable = [
    	'titulo',
    ];


    public function documentacao(){
        return $this->hasMany('App\Documentacao');
    }

}
