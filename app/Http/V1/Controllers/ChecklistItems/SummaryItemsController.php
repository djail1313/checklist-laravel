<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Models\Item;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SummaryItemsController extends Controller
{

    public function execute(Request $request)
    {
        return response()->json([
            'data' => $this->applyFilter($request)
        ]);
    }

    public function applyFilter($request)
    {
        $date = CarbonImmutable::now()->startOfDay();
        $object_domain = $request->query('object_domain');

        if ($request->query('date')) {
            $date = CarbonImmutable::createFromTimeString($request->query('date'), $request->query('tz'))->startOfDay();
        }

        $result = [
            'today' => $this->getTotalItems(
                $object_domain,
                $date->toMutable(),
                $date->endOfDay()->toMutable()
            ),
            'past_due' => $this->getTotalItems(
                $object_domain,
                null,
                $date->toMutable(),
                false
            ),
            'this_week' => $this->getTotalItems(
                $object_domain,
                $date->startOfWeek()->toMutable(),
                $date->endOfWeek()->toMutable()
            ),
            'past_week' => $this->getTotalItems(
                $object_domain,
                $date->startOfWeek()->subWeek()->toMutable(),
                $date->endOfWeek()->subWeek()->toMutable()
            ),
            'this_month' => $this->getTotalItems(
                $object_domain,
                $date->startOfMonth()->toMutable(),
                $date->endOfMonth()->toMutable()
            ),
            'past_month' => $this->getTotalItems(
                $object_domain,
                $date->startOfMonth()->subMonth()->toMutable(),
                $date->endOfMonth()->subMonth()->toMutable()
            ),
        ];

        $result['total'] = array_sum($result);

        return $result;
    }

    protected function getTotalItems($object_domain, ? Carbon $start_date, ? Carbon $end_date, $is_completed = null)
    {
        $query = Item::query();

        if ($object_domain) {
            $query = $query->whereHas('checklist', function (Builder $builder) use ($object_domain) {
                $builder->where('object_domain', $object_domain);
            });
        }
        if ($is_completed !== null) {
            $query = $query->where('is_completed', $is_completed);
        }
        if ($start_date) {
            $query = $query->where('due', '>=', $start_date);
        }
        if ($end_date) {
            $query = $query->where('due', '<=', $end_date);
        }

        return $query->count();
    }

}
