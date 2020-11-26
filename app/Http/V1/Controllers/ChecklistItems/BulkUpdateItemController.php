<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Items\BulkUpdateRequest;
use App\Models\Checklist;
use App\Models\Item;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class BulkUpdateItemController extends Controller
{

    public function execute(BulkUpdateRequest $request, Checklist $checklist)
    {
        $data = $request->input('data');
        if (! is_array($data))
            return response()->json(['data' => []]);

        $result = collect();

        foreach ($data as $datum) {
            switch ($datum['action']) {
                case 'update':
                    $result->push($this->update($datum));
                    break;
                default:
                    break;
            }
        }

        return response()->json(['data' => $result]);
    }

    protected function update($datum)
    {
        $item = Item::query()->find($datum['id']);
        $result = Arr::except($datum, ['attributes']);
        if (! $item) {
            $result['status'] = Response::HTTP_NOT_FOUND;
        } else {
            if ($item->update($datum['attributes']) > 0) {
                $result['status'] = Response::HTTP_OK;
            } else {
                $result['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
            }
        }
        return $result;
    }

}
