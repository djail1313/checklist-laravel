<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\V1\QueryBuilder\CustomQueryBuilder;
use App\Http\V1\Resources\Templates\TemplateCollection;
use App\Http\V1\Traits\Pagination;
use App\Models\Template;

class ListsController extends Controller
{

    use Pagination;

    public function execute()
    {
        return new TemplateCollection(
            $this->paginate(
                CustomQueryBuilder::for(Template::class)
                    ->with(['checklist', 'items'])
            )
        );
    }

}
