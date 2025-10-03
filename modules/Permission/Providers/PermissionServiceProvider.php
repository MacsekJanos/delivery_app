<?php

namespace Modules\Permission\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Permission\Policies\PermissionPolicy;
use Spatie\Permission\Models\Permission;

class PermissionServiceProvider extends ServiceProvider
{
    public array $policies = [
        Permission::class => PermissionPolicy::class,
    ];
    public function boot() : void
    {
        $this->mergeConfigFrom(base_path('modules\Permission\Configurations\default_permissions.php'), 'default_permissions');
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
