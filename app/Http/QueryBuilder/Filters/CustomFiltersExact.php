<?php


namespace App\Http\QueryBuilder\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;
use Spatie\QueryBuilder\Filters\FiltersExact;

class CustomFiltersExact extends FiltersExact implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
        if (! isset($value['is'])) return;
        $value = $value['is'];

        if ($this->addRelationConstraint) {
            if ($this->isRelationProperty($query, $property)) {
                $this->withRelationConstraint($query, $value, $property);

                return;
            }
        }

        if (is_array($value)) {
            $query->whereIn($query->qualifyColumn($property), $value);

            return;
        }

        $query->where($query->qualifyColumn($property), '=', $value);
    }

}
