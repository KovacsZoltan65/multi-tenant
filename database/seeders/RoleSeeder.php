<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        // Szuper Admin szerepkör létrehozása
        $superadmin = Role::create([ 'name' => 'superadmin' ]);

        // Jogosultságok társítása a Szuper Admin szerepkörhöz
        $superadmin->givePermissionTo([
            'read employee', 'create employee', 'update employee', 'delete employee', 'restore employee',
        ]);

        // Admin szerepkör létrehozása
        $admin = Role::create([ 'name' => 'admin' ]);

        // Jogosultságok társítása a Admin szerepkörhöz
        $admin->givePermissionTo([
            'read employee', 'create employee', 'update employee', 'delete employee',
        ]);

        // Operátor szerepkör létrehozása
        $operator = Role::create([ 'name' => 'operator' ]);

        // Jogosultságok társítása a Operátor szerepkörhöz
        $operator->givePermissionTo([
            'read employee',
        ]);
    }
}
