<?php

use App\Models\User;
use Modules\Permission\Dto\ModelPermission;
use Modules\Vehicle\Models\Vehicle;
use Modules\Work\Models\Work;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return [
    'admin' => [
        'access_panel delivery',
        ...ModelPermission::make(User::class)->viewAny()->view()->create()->update()->delete()->toArray(),
        ...ModelPermission::make(Role::class)->all()->toArray(),
        ...ModelPermission::make(Permission::class)->all()->toArray(),
        ...ModelPermission::make(Vehicle::class)->all()->toArray(),
        ...ModelPermission::make(Work::class)->all()->toArray(),
    ],
    'carrier' => [
        'access_panel delivery',
        ...ModelPermission::make(Work::class)->viewAny()->update()->toArray(),
    ]
];
