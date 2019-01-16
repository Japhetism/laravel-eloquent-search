<?php

namespace App\Search\BookFilters;
use App\Search\BookFilters;
use Illuminate\Database\Eloquent\Builder;

class Name implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('name', $value);
    }
}