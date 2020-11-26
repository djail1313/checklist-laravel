<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SummaryItemsController extends Controller
{

    public function execute(Request $request)
    {
        $items = $this->applyFilter(Item::query(), $request);


    }

    public function applyFilter($query, $request)
    {
        if ($object_domain = $request->query('object_domain')) {
            $query = $query->where('object_domain', $object_domain);
        }
        if ($date = $request->query('date')) {
            $query = $query->where('created_at', '<', Carbon::createFromTimeString($date));
        }
        return $query;
    }

}
