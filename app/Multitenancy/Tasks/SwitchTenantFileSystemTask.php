<?php

namespace App\Multitenancy\Tasks;

use Spatie\Multitenancy\Contracts\IsTenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

class SwitchTenantFilesystemTask implements SwitchTenantTask
{
    protected ?string $originalRoot = null;

    public function makeCurrent(IsTenant $tenant): void
    {
        $this->originalRoot = config('filesystems.disks.tenant.root');

        config([
            'filesystems.disks.tenant.root' => storage_path('app/tenants/' . $tenant->domain),
        ]);
    }

    public function forgetCurrent(): void
    {
        config([
            'filesystems.disks.tenant.root' => $this->originalRoot,
        ]);
    }

    /*
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
    */
}