<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        Tenant::insert([
            ['name' => 'Company 01', 'domain' => 'company-01.tenant', 'database' => 'company_01',
                'username' => 'company_01', 'password' => 'Pa$$w0rd', 'active' => 1,
                'created_at' => $now,    'updated_at' => $now,],
            ['name' => 'Company 02', 'domain' => 'company-02.tenant', 'database' => 'company_02',
            'username' => 'company_02', 'password' => 'Pa$$w0rd', 'active' => 1,
            'created_at' => $now,    'updated_at' => $now,],
        ]);
    }
}
