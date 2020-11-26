<?php


namespace App\Http\V1\Controllers\ChecklistItems;

use App\Events\ItemInChecklistCompleted;
use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Symfony\Component\HttpFoundation\Response;

class DeleteItemController extends Controller
{

    public function execute(Checklist $checklist, $item)
    {
        $item = $checklist->items()->findOrFail($item);

        $item->delete();
        $this->fireEvent($checklist);

        return response()->json()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    public function fireEvent($checklist)
    {
        event(new ItemInChecklistCompleted($checklist->id));
    }

}
