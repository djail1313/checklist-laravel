<?php


namespace App\Http\V1\Controllers\Histories;


use App\Http\Controllers\Controller;
use App\Http\V1\QueryBuilder\CustomQueryBuilder;
use App\Http\V1\Resources\Histories\HistoryCollection;
use App\Http\V1\Traits\Pagination;
use App\Models\History;

class ListsController extends Controller
{

    use Pagination;

    public function execute()
    {
        return new HistoryCollection(
            $this->paginate(
                CustomQueryBuilder::for(History::class)
            )
        );
    }

}
