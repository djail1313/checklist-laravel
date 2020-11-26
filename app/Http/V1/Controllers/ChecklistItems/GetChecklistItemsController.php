<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\ChecklistItems\ChecklistItemResource;
use App\Models\Checklist;

class GetChecklistItemsController extends Controller
{

    public function execute(Checklist $checklist)
    {
        return new ChecklistItemResource($checklist);
    }

}
