<?php

namespace App\Http\V1\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response_data = [
            'id' => (string) $this->getId(),
            'type' => $this->getType(),
            'attributes' => Arr::except($this->getAttributes($request), 'id'),
            'links' => [
                'self' => $this->getLink()
            ],
        ];
        if (($relationships = $this->getRelationShips($request))->count()) {
            $response_data['relationships'] = $relationships;
        }
        return $response_data;
    }

    public function getRelationShips(Request $request): Collection
    {
        $relations = $this->resource->getRelations();
        if (count($relations)) {
            return collect(array_keys($relations))->reduce(function ($carry, $include) use ($request) {
                /** @var Collection $carry */
                $function = Str::camel("get_{$include}_relationships");
                if (method_exists($this, $function)) {
                    $carry->put($include, $this->$function($request));
                }
                return $carry;
            }, collect());
        }
        return collect();
    }

    public abstract function getAttributes(Request $request): array;

    public abstract function getType(): string;

    public abstract function getId();

    public abstract function getLink(): string;

}
