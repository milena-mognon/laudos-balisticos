<?php

use App\Models\Calibre;
use Illuminate\Database\Seeder;

class CalibrePistolaSeeder extends Seeder
{

    public function run()
    {
        $calibres = ['.22LR', '.32ACP',
            '.380ACP', '9mm Luger',
            '.40S&W', '.45ACP',
            '.25ACP', '7.65mm', '.380 AUTO', '9X19'];

        foreach ($calibres as $calibre) {
            Calibre::create([
                'nome' => $calibre,
                'tipo_arma' => 'pistola'
            ]);
        }
    }
}
