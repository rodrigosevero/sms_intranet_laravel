<?php

use Illuminate\Database\Seeder;

class RegionalUnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('regional_unidades')->insert([
    		'id' => "1",
            'nome' => "Norte",
        ]);
        DB::table('regional_unidades')->insert([
    		'id' => "2",
            'nome' => "Sul",
        ]);
        DB::table('regional_unidades')->insert([
    		'id' => "3",
            'nome' => "Leste",
        ]);
        DB::table('regional_unidades')->insert([
    		'id' => "4",
            'nome' => "Oeste",
        ]);          
    }
}
