<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterLogin;
use App\Models\MasterLoginAdmin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat admin pertama
        $admin1 = MasterLogin::create([
            'username' => 'adminGR', // ubah username sesuai keinginan
            'password' => Hash::make('password123'), // ubah password sesuai keinginan
            'role' => 'admin',
        ]);

        // Menambahkan relasi ke tabel master_login_admins untuk admin pertama
        MasterLoginAdmin::create([
            'user_id' => $admin1->id,
            'department' => 'GR',
        ]);

        // Membuat admin kedua
        $admin2 = MasterLogin::create([
            'username' => 'adminBP', // ubah username sesuai keinginan
            'password' => Hash::make('password123'), // ubah password sesuai keinginan
            'role' => 'admin',
        ]);

        // Menambahkan relasi ke tabel master_login_admins untuk admin kedua
        MasterLoginAdmin::create([
            'user_id' => $admin2->id,
            'department' => 'BP',
        ]);

      
    }
}
