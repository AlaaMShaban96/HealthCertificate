<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PatientFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function name($name)
    {
        // return $this->where(function($q) use ($name)
        // {
            return $this->where('name', 'LIKE', "%$name%")
                ->orWhere('id', 'LIKE', "%$name%");
        // });
    }
    public function requestNumber($request_number)
    {

        return $this->WhereHas('request', function ($request) use ($request_number) {
                $request->where('request_number','LIKE', "%$request_number%");
            });
    }
    public function date($date)
    {

       if(isset($date['start'])) $start =  now()->setDateFrom($date['start'])->startOfDay() ;
       if(isset($date['end'])) $end = now()->setDateFrom($date['end'])->endOfDay();
        if (isset($start) &&$end ) {
            return $this->where(function($q) use ($start,$end)
            {
                return $q->WhereHas('request', function ($q) use ($start,$end) {
                        $q->whereBetween('created_at',  [$start,$end]);
                    });
            });
        }

    }
}
