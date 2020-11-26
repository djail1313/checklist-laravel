<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Items\ItemRelationshipResource;
use App\Models\Checklist;

class GetRelationshipsChecklistItemsController extends Controller
{

    public function execute(Checklist $checklist)
    {
        return ItemRelationshipResource::collection($checklist->items);
    }

}
