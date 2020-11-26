<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Http\Controllers\Controller;
use App\Http\V1\QueryBuilder\CustomQueryBuilder;
use App\Http\V1\Resources\Checklists\ChecklistCollection;
use App\Http\V1\Traits\Pagination;
use App\Models\Checklist;

class ListsController extends Controller
{
    use Pagination;

    public function execute()
    {
        return new ChecklistCollection(
            $this->paginate(
                CustomQueryBuilder::for(Checklist::class)
                    ->allowedIncludes(['items'])
            )
        );
    }

}
