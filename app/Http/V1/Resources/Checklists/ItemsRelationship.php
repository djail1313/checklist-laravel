<?php


namespace App\Http\V1\Resources\Checklists;


use App\Http\V1\Resources\Items\ItemRelationshipResource;
use App\Http\V1\Resources\RelationshipCollection;

class ItemsRelationship extends RelationshipCollection
{

    public function getSelfLink():? string
    {
        if ($this->collection->count())
            return route('checklist_items.relationship_lists',
                ['checklist' => $this->collection->get(0)->checklist_id]);
        return null;
    }

    public function getRelatedLink():? string
    {
        if ($this->collection->count())
            return route('checklist_items.lists',
                ['checklist' => $this->collection->get(0)->checklist_id]);
        return null;
    }

    public function getType(): string
    {
        return 'items';
    }

    public function getData()
    {
        return ItemRelationshipResource::collection($this->collection);
    }
}
