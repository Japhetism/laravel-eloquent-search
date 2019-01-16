<?php

namespace App\Search\BookFilters;
use App\Search\BookFilters;
use Illuminate\Database\Eloquent\Builder;

class Pages implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('pages', $value);
    }
}