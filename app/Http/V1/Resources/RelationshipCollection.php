<?php


namespace App\Http\V1\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

abstract class RelationshipCollection extends ResourceCollection
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

    public abstract function getData();

    public abstract function getSelfLink():? string;

    public abstract function getRelatedLink():? string;

    public abstract function getType(): string;

}
