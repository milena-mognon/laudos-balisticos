<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{

    public function run()
    {
        DB::table('estados')->insert(['nome' => 'Paraná', 'uf' => 'PR']);
    }
}
