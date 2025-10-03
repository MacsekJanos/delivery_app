<?php

namespace Modules\Vehicle\Policies;

use Modules\Permission\Policies\BasePolicy;
use Modules\Vehicle\Models\Vehicle;

class VehiclePolicy extends BasePolicy
{
    public static ?string $model = Vehicle::class;
}
