<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'email'=>'user@gmail.com',
                'name'=>'usuario',
                'ape_pat'=>'apellido 1',
                'ape_mat'=>'apellido 2',
                'documento'=>'72852803',
                'password'=>Hash::make('password'),
                'rol_id'=>1,
            ],
            [
                'id'=>2,
                'email'=>'user2@gmail.com',
                'name'=>'financiero',
                'ape_pat'=>'apellido 1',
                'ape_mat'=>'apellido 2',
                'documento'=>'72852802',
                'password'=>Hash::make('password'),
                'rol_id'=>2,
            ]
        ]);
    }
}
