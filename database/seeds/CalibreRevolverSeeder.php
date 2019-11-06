<?php

use App\Models\Calibre;
use Illuminate\Database\Seeder;

class CalibreRevolverSeeder extends Seeder
{

    public function run()
    {
        $calibres = ['.22LR', '.22 Curto',
            '.32S&W', '.32S&WL', '.38SPL',
            '.38 Curto', '.357 Magnum',
            '.44 Magnum', '.38 SPECIAL'];

        foreach ($calibres as $calibre) {
            Calibre::create([
                'nome' => $calibre,
                'tipo_arma' => 'Revólver'
            ]);
        }
    }
}
