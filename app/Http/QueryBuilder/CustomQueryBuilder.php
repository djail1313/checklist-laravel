<?php


namespace App\Http\QueryBuilder;


use App\Http\QueryBuilder\Concerns\CustomAddsFieldsToQuery;
use Spatie\QueryBuilder\QueryBuilder;

class CustomQueryBuilder extends QueryBuilder
{

    use CustomAddsFieldsToQuery;

}
