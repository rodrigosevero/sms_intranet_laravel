<?php

namespace App\Repositories\Noticia;
use App\Noticia;

class NoticiaRepository implements NoticiaInterface
{


	protected $noticia;
    private $url_base;

    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
        $this->url_api = "http://201.24.3.67:8080/portal/noticia/"; //Define default api url
    }

    public function listInicio(){
      //return $noticia = Noticia::where('status_id', '1')->orderBy('id')->take(3)->get(); 
      $url = $this->url_api.'noticiaDestaque'; // path to your JSON file
      $data = file_get_contents($url); // put the contents of the file into a variable
      $noticias = json_decode($data); // decode the JSON feed
      return $noticias;
    }




	public function listAll()
	{
        //return Noticia::where('status_id', '1')->orderBy('id', 'desc')->paginate(5);
        $url = $this->url_api.'ultimasNoticias'; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $noticias = json_decode($data); // decode the JSON feed
	    return  $noticias;
	}




    public function show($id)
    {
        //return Noticia::where('status_id', '1')->orderBy('id', 'desc')->paginate(5);
        $url = $this->url_api.'exibeNoticia/'.$id.''; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $noticia = json_decode($data); // decode the JSON feed
        return  $noticia;
    }


}