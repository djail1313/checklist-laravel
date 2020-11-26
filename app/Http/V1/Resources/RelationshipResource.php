<?php


namespace App\Http\V1\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

abstract class RelationshipResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'type' => $this->getType(),
            'id' => (string) $this->getId(),
        ];
    }

    public abstract function getType(): string;

    public abstract function getId();

}
