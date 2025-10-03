<?php

namespace Modules\Permission\Dto;

class ModelPermission
{

    public static array $actions = [
        'viewAny',
        'view',
        'create',
        'update',
        'delete',
    ];

    public string|null $model = null;

    public bool $viewAny = false;
    public bool $view = false;
    public bool $create = false;
    public bool $update = false;
    public bool $delete = false;

    public function __construct(string|null $class)
    {
        $this->model = $class;
    }

    public static function make(string|null $class): static
    {
        return new static($class);
    }
    public function toArray(): array
    {
        $result = [];
        $model = $this->model;
        if (!$model) {
            return $result;
        }

        foreach (static::$actions as $action) {
            if ($this->$action) {
                $result[] = "{$action} {$model}";
            }
        }

        return $result;
    }


    public function viewAny(bool $can = true): static
    {
        $this->viewAny = $can;
        return $this;
    }

    public function view(bool $can = true): static
    {
        $this->view = $can;
        return $this;
    }

    public function create(bool $can = true): static
    {
        $this->create = $can;
        return $this;
    }

    public function update(bool $can = true): static
    {
        $this->update = $can;
        return $this;
    }

    public function delete(bool $can = true): static
    {
        $this->delete = $can;
        return $this;
    }

    public function all(bool $can = true): static
    {
        foreach (static::$actions as $action) {
            $this->$action = $can;
        }
        return $this;
    }

}
