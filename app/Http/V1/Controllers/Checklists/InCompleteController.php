<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Events\ItemInChecklistInCompleted;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class InCompleteController extends Controller
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
            'data' => $this->inCompleteItems($data)
        ]);
    }

    protected function inCompleteItems(array $data): Collection
    {
        $data = collect($data);

        Item::whereIn('id', $data->pluck('item_id'))->update([
            'is_completed' => false
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
                event(new ItemInChecklistInCompleted($checklist_id));
            });
        }
    }

}
