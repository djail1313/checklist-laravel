<?php


namespace App\Http\V1\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class CustomResourceCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $response_data = [
            'data' => $this->getData(),
        ];

        if (($included = $this->getIncludedRelations($request))->count()) {
            $response_data['included'] = $included;
        }

        return $response_data;
    }

    public function getIncludedRelations(Request $request): Collection
    {
        if ($includes = $request->query('include')) {
            return collect(explode(
                ',',
                trim(preg_replace('/\s+/', ' ', $includes))
            ))->reduce(function ($carry, $include) use ($request) {
                /** @var Collection $carry */
                $function = Str::camel("get_{$include}_relationships");
                if (method_exists($this, $function)) {
                    return $carry->merge($this->$function($request));
                }
                return $carry;
            }, collect());
        }
        return collect();
    }

    protected function preparePaginatedResponse($request)
    {
        if ($this->preserveAllQueryParameters) {
            $this->resource->appends($request->query());
        } elseif (! is_null($this->queryParameters)) {
            $this->resource->appends($this->queryParameters);
        }

        return (new CustomPaginatedResourceResponse($this))->toResponse($request);
    }

    public abstract function getData();

}
