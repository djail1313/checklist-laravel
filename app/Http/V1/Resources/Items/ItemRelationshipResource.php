<?php


namespace App\Http\V1\Resources\Items;

use App\Http\V1\Resources\RelationshipResource;

class ItemRelationshipResource extends RelationshipResource
{

    public function getType(): string
    {
        return 'items';
    }

    public function getId()
    {
        return $this->id;
    }
}
