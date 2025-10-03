<?php

namespace Modules\Permission\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class BasePolicy
{
    public static ?string $model = null;

    public function viewAny(User $user): bool
    {
        return $user->can('viewAny ' . static::$model);
    }

    public function view(User $user, Model $record): bool
    {
        return $user->can('view ' . static::$model);
    }

    public function create(User $user): bool
    {
        return $user->can('create ' . static::$model);
    }

    public function update(User $user, Model $record): bool
    {
        return $user->can('update ' . static::$model);
    }


    public function delete(User $user, Model $record): bool
    {
        return $user->can('delete ' . static::$model);
    }

}
