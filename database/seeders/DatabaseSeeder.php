<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::create(['jenis_role' => 'Mahasiswa']);
        Role::create(['jenis_role' => 'Dosen']);
        Role::create(['jenis_role' => 'PAA']);
        \App\Models\User::factory(10)->create();
    }
}
