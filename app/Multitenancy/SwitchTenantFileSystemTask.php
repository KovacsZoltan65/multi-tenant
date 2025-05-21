<?php

namespace App\Multitenancy\Tasks;

use Spatie\Multitenancy\Contracts\IsTenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

class SwitchTenantFilesystemTask implements SwitchTenantTask
{
    public function makeCurrent(IsTenant $tenant): void
    {
        config([
            'filesystems.disks.tenant.root' => storage_path('app/tenants/' . $tenant->id),
        ]);
    }

    public function forgetCurrent(): void
    {
        // Opció: visszaállíthatod az alapértelmezett útvonalat
    }
}