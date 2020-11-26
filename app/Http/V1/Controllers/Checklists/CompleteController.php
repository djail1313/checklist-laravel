<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Events\ItemInChecklistCompleted;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CompleteController extends Controller
{

    public function execute(Request $request)
    {
        $data = $request->input('data');
        if (! $data) {
            return response()->json([
                'data' => []
            ]);
        }

        return response()->json([
            'data' => $this->completeItems($data)
        ]);
    }

    protected function completeItems(array $data): Collection
    {
        $data = collect($data);

        Item::whereIn('id', $data->pluck('item_id'))->update([
            'is_completed' => true,
            'completed_at' => Carbon::now(),
        ]);

        $items = Item::whereIn('id', $data->pluck('item_id'))->get();

        $result = $items->map(function ($item) {
            return collect([
                'id' => $item->id,
                'item_id' => $item->id,
                'is_completed' => $item->is_completed,
                'checklist_id' => $item->checklist_id,
            ]);
        });

        $this->fireEvent($items);

        return $result;
    }

    protected function fireEvent(Collection $items)
    {
        if ($items->count()) {
            $items->pluck('checklist_id')->unique()->each(function ($checklist_id) {
                event(new ItemInChecklistCompleted($checklist_id));
            });
        }
    }

}
