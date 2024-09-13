<?php

use Illuminate\Database\Seeder;

class TipoDocumentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //status 
    	DB::table('tipo_documentacoes')->insert([
    		'id' => "1",
            'titulo' => "Documento",
        ]);
        DB::table('tipo_documentacoes')->insert([
    		'id' => "2",
            'titulo' => "Vídeo Aula",
        ]);
    }
}
