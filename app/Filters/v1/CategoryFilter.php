<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CategoryFilter extends ApiFilter {
    protected $safeParms = [
        'name' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

    // public function transform(Request $request) 
    // {
    //     $eloQuery = [];
        
    //     foreach ($this->safeParms as $parm => $operators) {
    //         $query = $request->query($parm);
            
    //         if (!isset($query)) {
    //             continue;
    //         }

    //         $column = $parm;

    //         foreach ($operators as $operator) {
    //             if (isset($query[$operator])) {
    //                 $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
    //             }
    //         }
    //     }

    //     return $eloQuery;
    // }
}