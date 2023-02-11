<?php

namespace App\Services\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;


class CustomerQuery
{

    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'zip' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        // 'name' => 'name',
        // 'type' => 'type',
        // 'email' => 'email',
        // 'address' => 'address',
        // 'city' => 'city',
        // 'state' => 'state',
        'zip' => 'zip'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<'

    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [
                        $column,
                        $this->operatorMap[$operator],
                        $query[$operator]
                    ];
                }
            }
        }

        return $eloQuery;
    }
}
