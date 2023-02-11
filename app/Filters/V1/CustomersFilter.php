<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;


class CustomersFilter extends ApiFilter
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
        'zip' => 'zip'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<'

    ];
}
//http://127.0.0.1:8000/api/v1/customers?zip[gt]=80000&type[eq]=I