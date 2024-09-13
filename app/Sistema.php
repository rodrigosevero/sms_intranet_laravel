<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{

    protected $table = 'sistemas';

    protected $fillable = [
    	'nome', 'descricao', 'foto', 'link', 'user_id', 'status_id',
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }   

    public function documentacao(){
    	return $this->hasMany('App\Documentacao', 'documentacoes_id');
    }   

}
