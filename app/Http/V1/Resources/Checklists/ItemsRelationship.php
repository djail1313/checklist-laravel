<?php


namespace App\Http\V1\Resources\Checklists;


use App\Http\V1\Resources\RelationshipResource;

class ItemsRelationship extends RelationshipResource
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

}
