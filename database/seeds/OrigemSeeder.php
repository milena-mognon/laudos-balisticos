<?php

use App\Models\Origem;
use Illuminate\Database\Seeder;

class OrigemSeeder extends Seeder
{

    public function run()
    {
        $origens = ['Não Aparente' => 'não aparente',
            'EUA' => 'estadunidense',
            'Argentina' => 'argentina',
            'Espanha' => 'espanhola',
            'Brasil' => 'brasileira',
            'Canadá' => 'canadense',
            'Áustria' => 'austriaca',
            'Czechoslovakia' => 'tcheca',
            'México' => 'mexicana',
            'Itália' => 'italiana',
            'Finlândia' => 'finlandesa'];

        foreach ($origens as $origem => $extenso) {
            Origem::create([
                'nome' => $origem,
                'fabricacao' => $extenso,
            ]);
        }
    }
}
