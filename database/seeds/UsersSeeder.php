<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Usuário Admin',
            'email' => 'admin@mail.com',
            'cargo_id' => 2,
            'secao_id' => 6,
            'password' => bcrypt('abc123')]);

        DB::table('users')->insert([
            'nome' => 'Usuário Perito',
            'email' => 'perito@mail.com',
            'cargo_id' => 2,
            'secao_id' => 6,
            'password' => bcrypt('abc123')]);
    }
}
