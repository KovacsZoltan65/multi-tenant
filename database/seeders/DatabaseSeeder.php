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
        $this->call([
            EmployeeSeeder::class,

            // Fontos a sorrend, ne változtasd meg!!!
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            // ------------------------------------
        ]);

        /*
        // tenant specifikus seeder
        $tenant = Tenant::current(); // vagy app(Tenant::class)

        if (!$tenant) {
            $this->command->error('No tenant context available.');
            return;
        }

        match ($tenant->domain) {
            'company_01.localhost' => $this->call(Company01Seeder::class),
            'company_02.localhost' => $this->call(Company02Seeder::class),
            default => $this->call(DefaultTenantSeeder::class),
        };

        vagy:

        if ($tenant->domain === 'company_01.localhost') {
            $this->call(Company01Seeder::class);
        } elseif ($tenant->domain === 'company_02.localhost') {
            $this->call(Company02Seeder::class);
        } else {
            $this->call(DefaultTenantSeeder::class);
        }

        vagy:

        match ($tenant->id) {
            'tenant_abc' => $this->call(TenantAbcSeeder::class),
            default => $this->call(DefaultTenantSeeder::class),
        };
        
        */

    }

    public function runLandlordSpecificSeeders()
    {
        // run landlord specific seeders
        $this->call([
            TenantSeeder::class,
        ]);
    }
}
