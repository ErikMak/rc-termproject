<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter {
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder): void
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = camel_case($field);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
    }

    /**
     * @return array
     */
    protected function fields(): array
    {
        return array_filter(
            array_map('trim', $this->request->all())
        );
    }
}
