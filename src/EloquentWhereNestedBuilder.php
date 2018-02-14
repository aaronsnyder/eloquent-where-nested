<?php

namespace AaronSnyder\EloquentWhereNested;

use Illuminate\Database\Eloquent\Builder;

class WhereNestedBuilder extends Builder
{
    public function whereNested()
    {
        if ($column instanceof Closure) {
            $query = $this->model->newQueryWithoutScopes();

            $column($query);

            $this->query->addNestedWhereQuery($query->getQuery(), $boolean);
        } else {
            $this->query->where(...func_get_args());
        }

        return $this;
    }
}
