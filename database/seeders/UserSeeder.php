<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // SuperAdmin felhasznó létrehozása
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('superadmin'),
            'email_verified_at' => date('Y-m-d H:i'),
        ]);
        // Szerepkör asszociáció
        $superadmin->assignRole('superadmin');

        // Admin felhasznó létrehozása
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('admin'),
            'email_verified_at' => date('Y-m-d H:i')
        ]);
        // Szerepkör asszociáció
        $admin->assignRole('admin');

        //
        $operator = User::create([
            'name'              => 'Operator',
            'email'             => 'operator@operator.com',
            'password'          => bcrypt('operator'),
            'email_verified_at' => date('Y-m-d H:i')
        ]);
        // Szerepkör asszociáció
        $operator->assignRole('operator');
    }
}
