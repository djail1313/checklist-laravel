<?php


namespace App\Http\V1\QueryBuilder;


use App\Http\V1\QueryBuilder\Filters\CustomFiltersExact;
use App\Http\V1\QueryBuilder\Filters\CustomFiltersScope;
use Spatie\QueryBuilder\AllowedFilter;

class CustomAllowedFilter extends AllowedFilter
{

    public static function exact(string $name, ?string $internalName = null, bool $addRelationConstraint = true, string $arrayValueDelimiter = null): self
    {
        static::setFilterArrayValueDelimiter($arrayValueDelimiter);

        return new static($name, new CustomFiltersExact($addRelationConstraint), $internalName);
    }

    public static function scope(string $name, $internalName = null, string $arrayValueDelimiter = null): self
    {
        static::setFilterArrayValueDelimiter($arrayValueDelimiter);

        return new static($name, new CustomFiltersScope(), $internalName);
    }

}
