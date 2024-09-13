<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(StatuSeeder::class);
       $this->call(RegionalUnidadeSeeder::class);
       $this->call(TipoDocumentacaoSeeder::class);
    }
}
