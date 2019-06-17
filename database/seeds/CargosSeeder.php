<?php

use Illuminate\Database\Seeder;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{

    public function run()
    {
        $cargos = ['Perito', 'Administrador'];

        foreach ($cargos as $cargo) {
            Cargo::create([
                'nome' => $cargo,
            ]);
        }
    }
}