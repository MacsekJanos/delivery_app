<?php

namespace Modules\Work\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
class WorkVisibilityScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $user = auth()->user();

        if ($user->hasRole('carrier')) {
            $builder->where($model->getTable().'.user_id', $user->id);
        }
    }
}
