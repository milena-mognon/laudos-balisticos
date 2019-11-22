<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiretoresSeeder extends Seeder
{

    public function run()
    {
        DB::table('diretores')->insert([
            'nome' => 'Nome Diretor 1',
            'inicio_direcao' => formatar_data('17/09/2018'),
            'fim_direcao' => formatar_data('12/12/2019')]);
        DB::table('diretores')->insert([
            'nome' => 'Nome Diretor 2',
            'inicio_direcao' => formatar_data('17/09/2018'),
            'fim_direcao' => formatar_data('12/12/2019')]);
        
    }
}