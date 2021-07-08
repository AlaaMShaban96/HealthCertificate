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
        return $this->where(function($q) use ($name)
        {
            return $q->where('name', 'LIKE', "%$name%")
                ->orWhere('id', 'LIKE', "%$name%")
                ->orWhereHas('request', function ($q) use ($name) {
                    $q->where('request_number',  'LIKE', "%$name%");
                });
        });
    }
    public function date($date)
    {
        // dd($date);
        return $this->where(function($q) use ($date)
        {
            return $q->WhereHas('request', function ($q) use ($date) {
                    $q->whereBetween('created_at',  [$date['start'],$date['end']]);
                });
        });
    }
}
