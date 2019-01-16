<?php

namespace App\Search\ApplicantFilters;
use App\Search\ApplicantFilters;
use Illuminate\Database\Eloquent\Builder;

class QueryDate implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        $values = explode('/', $value);
        return $builder->whereDate('created_at',[$value[0], $value[1]])->get();
    }
}