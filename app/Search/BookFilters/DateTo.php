<?php

namespace App\Search\BookFilters;
use App\Search\BookFilters;
use Illuminate\Database\Eloquent\Builder;

class DateTo implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        $values = explode('/', $value);
        
        if($values[1] == "link"){
            return $builder->whereDate('created_at','<=',$values[0]);
        }elseif($values[1] == "taken"){
            return $builder->whereDate('updated_at','<=',$values[0]);
        }
    }
}