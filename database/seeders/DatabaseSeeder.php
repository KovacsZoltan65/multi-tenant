<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        Tenant::checkCurrent() 
            ? $this->runTenantSpecificSeeders() 
            : $this->runLandlordSpecificSeeders();
    }

    public function runTenantSpecificSeeders()
    {
        // run tenant specific seeders
        $this->call(EmployeeSeeder::class);
    }

    public function runLandlordSpecificSeeders()
    {
        // run landlord specific seeders
        $this->call(TenantSeeder::class);
    }
}
