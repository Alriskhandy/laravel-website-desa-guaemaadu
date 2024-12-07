<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            'nama' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'nama' => 'Kades',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('admin123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Kades',
            'email' => 'kades@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('kades123'),
        ]);

        DB::table('bumdes')->insert([
            'nama' => 'Profil BUMDes',
        ]);
        DB::table('bumdes')->insert([
            'nama' => 'Struktur Organisasi BUMDes',
        ]);
    }
}
