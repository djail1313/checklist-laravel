<?php


namespace App\Http\V1\Controllers\ChecklistItems;

use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Items\UpdateRequest;
use App\Http\V1\Resources\Items\ItemResource;
use App\Models\Checklist;

class UpdateItemController extends Controller
{

    public function execute(UpdateRequest $request, Checklist $checklist, $item)
    {
        $item = $checklist->items()->findOrFail($item);

        if ($request->getData()) {
            $item->update($request->getData());
        }

        return new ItemResource($item);
    }

}
