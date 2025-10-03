<?php
namespace Modules\Work\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Work\Models\Work;
use Modules\Work\Policies\WorkPolicy;

class WorkServiceProvider extends ServiceProvider
{
    public array $policies = [
        Work::class => WorkPolicy::class,
    ];
    public function boot(): void
    {
        $this->loadMigrationsFrom(base_path('modules/Work/Database/Migrations/'));
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
