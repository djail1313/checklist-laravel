<?php


namespace App\Http\V1\Resources\Templates;

use App\Http\V1\Resources\Checklists\ChecklistResource;
use App\Http\V1\Resources\Items\ItemResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ChecklistCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $count = $this->collection->count();
        return [
            'meta' => [
                'count' => $count,
                'total' => $count,
            ],
            'data' => ChecklistResource::collection($this->collection),
            'included' => ItemResource::collection($this->getIncludedRelations()),
        ];
    }

    public function getIncludedRelations()
    {
        return $this->collection->reduce(function ($carry, $checklist) {
            /** @var Collection $carry */
            return $carry->merge($checklist->items);
        }, collect());
    }

}
