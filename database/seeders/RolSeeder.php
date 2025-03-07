<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id'=>1,
                'nombre'=>'admin',
                'estado'=>1
            ],
            [
                'id'=>2,
                'nombre'=>'financiero',
                'estado'=>1
            ]
        ]);
    }
}
