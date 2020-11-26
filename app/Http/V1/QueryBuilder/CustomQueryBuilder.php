<?php


namespace App\Http\V1\QueryBuilder;


use App\Http\V1\QueryBuilder\Concerns\CustomAddsFieldsToQuery;
use Spatie\QueryBuilder\QueryBuilder;

class CustomQueryBuilder extends QueryBuilder
{

    use CustomAddsFieldsToQuery;

}
