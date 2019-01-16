<?php
namespace App\Search;
use App\Book;
use Illuminate\Http\Request;
use App\Search\BookFilters;
use Illuminate\Database\Eloquent\Builder;

class BookSearch
{

    public static function apply(Request $filters)
    {
        $query = 
            static::applyDecoratorsFromRequest(
                $filters, (new Book)->newQuery());

        return static::getResults($query);
    }
    
    private static function applyDecoratorsFromRequest($request, Builder $query)
    {
        if($request['date_type']){
            $date_from = $request['date_from'].'/'.$request['date_type'];
            $date_to = $request['date_to'].'/'.$request['date_type'];
        }else{
            $date_to = "";
            $date_from = "";
        }
         $filter_request = [
            'name' => (!empty($request['name'])) ? $request['name'] : null,
            'edition' => (!empty($request['edition'])) ? $request['edition'] : null,
            'cost' => (!empty($request['cost'])) ? $request['cost'] : null,
            'pages' => (!empty($request['pages'])) ? $request['pages'] : null,
            'date_from' => (!empty($date_from)) ? $date_from: null,
            'date_to' => (!empty($date_to)) ? $date_to: null,
        ];

        foreach ($filter_request as $filterName => $value) {

            if($value){
                $decorator = static::createFilterDecorator($filterName);

                if (static::isValidDecorator($decorator)) {
                    $query = $decorator::apply($query, $value);
                }

            }
        }
        return $query;
    }
    
    private static function createFilterDecorator($name)
    {
        return  __NAMESPACE__ . '\\BookFilters\\' .
            str_replace(' ', '', 
                ucwords(str_replace('_', ' ', $name)));
    }
    
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query)
    {
        return $query->get();
    }


}
