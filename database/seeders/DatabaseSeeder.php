<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Roles y permiso 
        $this->call(RoleSeeder::class);

        //Usuarios Base
        $this->call(UserSeeder::class);
        //Productos de prueba
        $this->call(ProductSeeder::class);


        \App\Models\User::factory(25)->create();
    }
}
