<?php

namespace Modules\Vehicle\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Vehicle\Models\Vehicle;
use Modules\Vehicle\Policies\VehiclePolicy;

class VehicleServiceProvider extends ServiceProvider
{
    public array $policies = [
        Vehicle::class => VehiclePolicy::class,
    ];
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/Vehicle/Database/Migrations/'));
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
