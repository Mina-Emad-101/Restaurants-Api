<?php

namespace App\Builders\V1;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantQueryBuilder
{
    protected Request $request;

    protected Builder $builder;

    protected Filter $filter;

    public function __construct(Builder $builder, Request $request, Filter $filter)
    {
        $this->request = $request;
        $this->builder = $builder;
        $this->filter = $filter;
    }

    public function filterByEquality(): self
    {
        $queries = $this->filter->transform($this->request);

        $this->builder = $this->builder->where($queries);

        return $this;
    }

    public function filterByBooleans(): self
    {
        if ($this->request->query('includeCuisines')) {
            $this->builder = $this->builder->with('cuisines');
        }

        return $this;
    }

    public function end(): Builder
    {
        return $this->builder;
    }
}
