<?php


namespace App\Http\QueryBuilder\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\Filters\FiltersScope;

class CustomFiltersScope extends FiltersScope
{

    public function __invoke(Builder $query, $values, string $property): Builder
    {
        if (Arr::isAssoc($values)) {
            return collect(array_keys($values))->reduce(function ($query, $key) use ($property, $values) {
                return $this->buildQuery($query, $values[$key], $property . '_' . $key);
            }, $query);
        } else {
            return $this->buildQuery($query, $values, $property);
        }
    }

    protected function buildQuery(Builder $query, $values, string $property): Builder
    {
        $propertyParts = collect(explode('.', $property));

        $scope = Str::camel($propertyParts->pop());

        $values = array_values(Arr::wrap($values));
        $values = $this->resolveParameters($query, $values, $scope);

        $relation = $propertyParts->implode('.');

        if ($relation) {
            return $query->whereHas($relation, function (Builder $query) use ($scope, $values) {
                return $query->$scope(...$values);
            });
        }

        return $query->$scope(...$values);
    }

}
