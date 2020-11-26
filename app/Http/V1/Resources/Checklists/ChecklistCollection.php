<?php


namespace App\Http\V1\Resources\Checklists;


use App\Http\V1\Resources\CustomResourceCollection;
use App\Http\V1\Resources\Items\ItemResource;
use Illuminate\Http\Request;

class ChecklistCollection extends CustomResourceCollection
{

    public function getData()
    {
        return ChecklistResource::collection($this->collection);
    }

    public function getItemsRelationships(Request $request)
    {
        return ItemResource::collection(
            $this->collection->reduce(function ($carry, $checklist) {
                return $carry->merge($checklist->items);
            }, collect())
        );
    }
}
