<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadeSaude extends Model
{
    //Define name manually
    protected $table = 'unidade_saudes';

    protected $fillable = [
        'nome', 'nome2', 'nome3', 'endereco', 'telefone', 'foto', 'latitude', 'longitude', 'tipounidade_id', 
        'regionalunidade_id', 'esus', 'status_id',
    ];


    public function statu(){
        return $this->belongsTo('App\Statu', 'status_id');
    }
    

    public function tipounidade(){
        return $this->belongsTo('App\TipoUnidade');
    }

    public function regionalunidade(){
        return $this->belongsTo('App\RegionalUnidade');
    }

    

}
