<?php

use Illuminate\Database\Seeder;

class StatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('status')->truncate();
       //status 
    	DB::table('status')->insert([
    		'id' => "1",
            'nome' => "Ativado",
        ]);
        DB::table('status')->insert([
    		'id' => "2",
            'nome' => "Desativado",
        ]);
    }
}
