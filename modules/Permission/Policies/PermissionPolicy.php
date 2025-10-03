<?php

namespace Modules\Permission\Policies;

use Spatie\Permission\Models\Permission;

class PermissionPolicy extends BasePolicy
{
    public static ?string $model = Permission::class;
}
