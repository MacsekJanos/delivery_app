<?php

namespace Modules\User\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\User\Policies\UserPolicy;

class UserServiceProvider extends ServiceProvider
{
    public array $policies = [
        User::class => UserPolicy::class,
    ];
    public function boot(): void
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
