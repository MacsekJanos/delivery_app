<?php

namespace Modules\Work\Policies;

use App\Models\User;
use Modules\Permission\Policies\BasePolicy;
use Modules\Work\Models\Work;

class WorkPolicy extends BasePolicy
{
    public static ?string $model = Work::class;
}
