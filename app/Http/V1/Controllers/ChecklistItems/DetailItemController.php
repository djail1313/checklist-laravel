<?php


namespace App\Http\V1\Controllers\ChecklistItems;

use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Items\ItemResource;
use App\Models\Checklist;

class DetailItemController extends Controller
{

    public function execute(Checklist $checklist, $item)
    {
        return new ItemResource($checklist->items()->findOrFail($item));
    }

}
