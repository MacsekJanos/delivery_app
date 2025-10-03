<?php

namespace Modules\Permission\Policies;

use Spatie\Permission\Models\Role;

class RolePolicy extends BasePolicy
{
    public static ?string $model = Role::class;

    public array $policies = [
        Role::class => RolePolicy::class,
    ];
}
