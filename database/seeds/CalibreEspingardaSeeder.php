<?php

use App\Models\Calibre;
use Illuminate\Database\Seeder;

class CalibreEspingardaSeeder extends Seeder
{

    public function run()
    {
        $calibres = ['não aparente',
            '12GA', '16GA', '20GA',
            '24GA', '28GA', '32GA',
            '36GA', '40GA'];

        foreach ($calibres as $calibre) {
            Calibre::create([
                'nome' => $calibre,
                'tipo_arma' => 'Espingarda'
            ]);
        }
    }
}
