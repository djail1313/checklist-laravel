<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Events\ItemInChecklistInCompleted;
use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Items\CreateRequest;
use App\Http\V1\Resources\Items\ItemResource;
use App\Models\Checklist;
use App\Models\Item;

class CreateItemController extends Controller
{

    public function execute(CreateRequest $request, Checklist $checklist)
    {
        $item = $checklist->items()->create($request->getData());
        $this->fireEvent($item);
        return new ItemResource(Item::find($item->id));
    }

    protected function fireEvent($item)
    {
        event(new ItemInChecklistInCompleted($item->checklist_id));
    }

}
