<?php


namespace App\Http\V1\Controllers\ChecklistItems;


use App\Http\Controllers\Controller;
use App\Http\V1\QueryBuilder\CustomAllowedFilter;
use App\Http\V1\QueryBuilder\CustomQueryBuilder;
use App\Http\V1\Resources\Items\ItemCollection;
use App\Http\V1\Traits\Pagination;
use App\Models\Item;

class ListItemsController extends Controller
{

    use Pagination;

    public function execute()
    {
        return new ItemCollection(
            $this->paginate(
                CustomQueryBuilder::for(Item::class)
                    ->allowedFilters(
                        CustomAllowedFilter::exact('created_by'),
                        CustomAllowedFilter::exact('assignee_id'),
                        CustomAllowedFilter::exact('is_completed'),
                        CustomAllowedFilter::scope('due')
                    )
                    ->allowedSorts(['*'])
            )
        );
    }

}
