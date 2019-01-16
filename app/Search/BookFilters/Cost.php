<?php

namespace App\Search\BookFilters;
use App\Search\BooktFilters;
use Illuminate\Database\Eloquent\Builder;

class Cost implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('cost', $value);
    }
}