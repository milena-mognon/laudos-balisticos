<?php

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaArmasSeeder extends Seeder
{

    public function run()
    {
        $marcas_armas = ['Não Aparente', 'CBC', 'Taurus',
            'Rossi', 'Smith and Wesson', 'INA', 'Beretta',
            'Castelo', 'Glock', 'Boito', 'B.H.',
            ' Winchester', 'BRNO', 'Doberman', 'Tanfoglio', 'Bersa'];

        foreach ($marcas_armas as $marca) {
            Marca::create([
                'nome' => $marca,
                'categoria' => 'armas',
            ]);
        }
    }
}
