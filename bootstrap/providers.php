<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Modules\Work\Providers\WorkServiceProvider::class,
    Modules\Vehicle\Providers\VehicleServiceProvider::class,
    Modules\Permission\Providers\PermissionServiceProvider::class,
    Modules\Permission\Providers\RoleServiceProvider::class,
    Modules\User\Providers\UserServiceProvider::class,
];
