<?php


namespace App\Http\V1\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

abstract class RelationshipResource extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'links' => [
                'self' => $this->getSelfLink(),
                'related' => $this->getRelatedLink(),
            ],
            'data' => $this->getData(),
        ];
    }

    public function getData(): Collection
    {
        return $this->collection->map(function ($data) {
            return [
                'type' => $this->getType(),
                'id' => (string) $data->id,
            ];
        });
    }

    public abstract function getSelfLink():? string;

    public abstract function getRelatedLink():? string;

    public abstract function getType(): string;

}
