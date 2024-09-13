<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ac_intranet', 'ac_helpdesk', 'ac_reqobra',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function statu(){
        return $this->hasMany('App\Statu');
    }

    public function noticia(){
        return $this->hasMany('App\Noticia');
    }

    public function comunicado(){
        return $this->hasMany('App\Comunicado');
    }

    public function download(){
        return $this->hasMany('App\Download');
    }

    public function evento(){
        return $this->hasMany('App\Evento');
    }

    public function sistema(){
        return $this->hasMany('App\Sistema');
    }

    public function tipodownload(){
        return $this->hasMany('App\TipoDownload');
    }

    public function tipounidade(){
        return $this->hasMany('App\TipoUnidade');
    }


}
