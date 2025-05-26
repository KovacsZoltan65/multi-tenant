<?php

namespace App\Http\Controllers\hq;

use App\Http\Controllers\Controller;
use Spatie\Multitenancy\Models\Tenant;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $currentTenant = Tenant::current();
        $tenants = Tenant::where('name', '<>', 'HQ')->get()->toArray();
        echo '<pre>';
        print_r('Current: ' . $currentTenant->name . '<br />');
        
        foreach( $tenants as $tenant ) {
          
            print_r('Actual: ' . $tenant['name'] . '<br />');
            
            $connectionName = 'tenant_' . $tenant['id'];
                    
            Config::set("database.connections.{$connectionName}", [
                'driver' => 'mysql',
                'host' => $tenant['host'],
                'port' => $tenant['port'],
                'database' => $tenant['database'],
                'username' => $tenant['username'],
                'password' => $tenant['password'],
                'charset' => 'utf8mb3',
                'collation' => 'utf8mb3_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => 'InnoDB',
            ]);
            
            DB::purge($connectionName); // Előző kapcsolat törlése, ha volt
            DB::reconnect($connectionName); // Új kapcsolat létrehozása
            
            //$emails = DB::connection($connectionName)->table('emails')->get();
            // vagy
            $emails = \App\Models\Email::on($connectionName)->get();
            
            print_r('Emails: ' . '<br />');
            
            foreach($emails as $email) {
                print_r($email->to . '<br />');
            }
            print_r('----------------------' . '<br />');

            // További feldolgozás...
            
        }
        
        echo '</pre>';
    }
}
