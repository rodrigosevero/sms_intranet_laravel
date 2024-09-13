<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
	
  protected $table = 'status';

  protected $fillable = [
      'nome',
  ];

  //public $table = 'status'; //for plural names - laravel adds 's' to table names. this forces the table name.

  //Status belongs to user.
  public function noticia()
  {
        return $this->hasMany('App\Noticia');
  }

  public function user()
  {
        return $this->hasMany('App\User');
  }

  public function comunicado()
  {
        return $this->hasMany('App\Comunicado');
  }

  public function evento()
  {
        return $this->hasMany('App\Evento');
  }

  public function unidadesaude()
  {
        return $this->hasMany('App\UnidadeSaude');
  }


  public function tipounidade()
  {
        return $this->hasMany('App\TipoUnidade');
  }

  public function sistema()
  {
        return $this->hasMany('App\Sistema');
  }

  public function download()
  {
        return $this->hasMany('App\Download');
  }

  public function tipodownload()
  {
        return $this->hasMany('App\TipoDownload');
  }

  public function documentacao()
  {
        return $this->hasMany('App\Documentacao');
  }

  // public function evento()
  // {
  //       return $this->hasOne('App\Evento');
  // }
  
  //  public function sistema()
  // {
  //       return $this->hasOne('App\Sistema');
  // }   

  //  public function tipodownload()
  // {
  //       return $this->hasOne('App\TipoDownload');
  // }

  //  public function tipounidade()
  // {
  //       return $this->hasOne('App\TipoUnidade');
  // }

  //  public function unidadesaude()
  // {
  //       return $this->hasOne('App\UnidadeSaude');
  // }

}
