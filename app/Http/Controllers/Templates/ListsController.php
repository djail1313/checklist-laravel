<?php


namespace App\Http\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\QueryBuilder\CustomQueryBuilder;
use App\Http\Resources\Templates\TemplateCollection;
use App\Http\Traits\Pagination;
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
