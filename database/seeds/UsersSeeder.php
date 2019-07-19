<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'nome' => 'Milena Mognon',
            'email' => 'milena@mail.com',
            'cargo_id' => 2,
            'secao_id' => 6,
            'password' => bcrypt('123456')]);
    }
}
