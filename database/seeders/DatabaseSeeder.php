<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CategoriasSeeder::class,
            CategoriaClasificacionesSeeder::class,
            GenericasSeeder::class,
            ClasificacionSubItemsSeeder::class,
            InsumosSeeder::class,
            DetalleSeeder::class,
            TipoCuentaSeeder::class,
            ComprobanteTipoSeeder::class,
            TransaccionTipoSeeder::class
        ]);
    }
}
