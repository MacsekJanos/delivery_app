<?php

namespace Modules\Permission\Filament\Resources\Permissions\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Permission\Filament\Resources\Permissions\PermissionResource;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;
}
