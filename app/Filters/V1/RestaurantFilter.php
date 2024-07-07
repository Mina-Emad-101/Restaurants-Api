<?php

namespace App\Filters\V1;

use App\Filters\Filter;
use Illuminate\Http\Request;

class RestaurantFilter implements Filter
{
    protected $safeParms = [
        'name' => ['eq'],
        'location' => ['eq'],
    ];

    protected $parmMap = [
        'location' => 'location_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
    ];

    private function addQuery(string $column, string $operator, string $value): array
    {
        $relationCols = [
            'location_id',
        ];

        if (in_array($column, $relationCols)) {
            $model = 'App\\Models\\'.ucwords(explode('_', $column)[0]);
            $value = $model::where('name', '=', $value)->firstOrFail()->id;
        }

        $query = [$column, $operator, $value];

        return $query;
    }

    public function transform(Request $request): array
    {
        $eloQuery = [];

        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if (! isset($query)) {
                continue;
            }

            // Column, Operator, Value
            $column = $this->parmMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    array_push($eloQuery, $this->addQuery($column, $this->operatorMap[$operator], ucwords($query[$operator])));
                }
            }

        }

        return $eloQuery;
    }
}
