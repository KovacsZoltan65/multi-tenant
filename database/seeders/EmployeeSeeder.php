<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        Employee::insert([
            ['name' => 'John Doe','position' => 'CEO','email' => '2F4R2@example.com','created_at' => $now,    'updated_at' => $now,],
            ['name' => 'Jane Doe','position' => 'CTO','email' => '2F4R3@example.com','created_at' => $now,    'updated_at' => $now,],
    ]);
    }
}
