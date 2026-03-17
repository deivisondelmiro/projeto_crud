<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@coursehub.com.br',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
        // \App\Models\User::factory(10)->create();
    }
}