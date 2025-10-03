<?php

namespace Modules\User\Policies;

use App\Models\User;
use Modules\Permission\Policies\BasePolicy;

class UserPolicy extends BasePolicy
{
    public static ?string $model = User::class;
}
