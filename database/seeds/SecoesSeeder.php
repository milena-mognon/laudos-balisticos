<?php

use App\Models\Secao;
use Illuminate\Database\Seeder;

class SecoesSeeder extends Seeder
{

    public function run()
    {
        $secoes = ['Curitiba', 'Paranaguá',
            'Ponta Grossa', 'Londrina',
            'Maringá', 'Guarapuava',
            'Cascavel', 'Umuarama',
            'Foz do Iguaçu', 'Francisco Beltrão'];

        foreach ($secoes as $secao) {
            Secao::create([
                'nome' => $secao,
            ]);
        }
    }
}
