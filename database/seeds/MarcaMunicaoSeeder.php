<?php

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaMunicaoSeeder extends Seeder
{

    public function run()
    {
        $marcas_municoes = ['CBC', 'Aguila', 'S&B', 'SP',
            'Federal', 'Winchester', 'PMC', 'FMFLB',
            'MRP', 'W-W', 'Lapua', 'R-P', 'AP', 'WIN', 'BLAZER', 'V'];

        foreach ($marcas_municoes as $marca) {
            Marca::create([
                'nome' => $marca,
                'categoria' => 'Munição',
            ]);
        }
    }
}
