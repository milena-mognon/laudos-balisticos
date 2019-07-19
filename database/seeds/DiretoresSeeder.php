<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiretoresSeeder extends Seeder
{

    public function run()
    {
        DB::table('diretores')->insert([
            'nome' => 'Dr. Márcio Borges de Macedo',
            'inicio_direcao' => formatar_data('17/09/2018'),
            'fim_direcao' => formatar_data('12/12/2019')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Antônio Edison Vaz De Siqueira',
            'inicio_direcao' => formatar_data('12/04/2011'),
            'fim_direcao' => formatar_data('20/11/2012')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Carlos Roberto Martins De Lima',
            'inicio_direcao' => formatar_data('21/08/2006'),
            'fim_direcao' => formatar_data('11/04/2011')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Daniel Felipetto',
            'inicio_direcao' => formatar_data('06/02/2015'),
            'fim_direcao' => formatar_data( '30/03/2017')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Emerson Luiz Lesniowski',
            'inicio_direcao' => formatar_data('31/03/2017'),
            'fim_direcao' => formatar_data('11/03/2018')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Hemerson Bertassoni Alves',
            'inicio_direcao' => formatar_data('18/03/2014'),
            'fim_direcao' => formatar_data('06/02/2015')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Marco Antônio De Souza',
            'inicio_direcao' => formatar_data('12/03/2018'),
            'fim_direcao' => formatar_data('17/09/2018')]);
        DB::table('diretores')->insert([
            'nome' => 'Dr. Marco Aurelio Bertoldi Pimpão',
            'inicio_direcao' => formatar_data('20/11/2012'),
            'fim_direcao' => formatar_data('18/03/2014')]);
    }
}
