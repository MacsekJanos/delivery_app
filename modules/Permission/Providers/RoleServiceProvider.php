<?php

namespace Modules\Permission\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Permission\Policies\RolePolicy;
use Spatie\Permission\Models\Role;

class RoleServiceProvider extends ServiceProvider
{
    public array $policies = [
        Role::class => RolePolicy::class,
    ];
    public function boot(): void
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
