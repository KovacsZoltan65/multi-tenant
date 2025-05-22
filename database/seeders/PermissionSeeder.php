<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $permissions = [
            ['name' => 'read employee',],
            ['name' => 'create employee',],
            ['name' => 'update employee',],
            ['name' => 'delete employee',],
            ['name' => 'restore employee',],
        ];

        foreach($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
