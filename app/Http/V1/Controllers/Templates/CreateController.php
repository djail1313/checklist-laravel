<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Templates\CreateRequest;
use App\Http\V1\Resources\Templates\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{

    public function execute(CreateRequest $request)
    {
        $template = new Template($request->getTemplate());

        DB::transaction(function () use ($request, $template) {

            $template->save();

            if ($request->getChecklist()) {
                $template->checklist()->create($request->getChecklist());
            }

            $template->items()->createMany($request->getItems());

        });

        return (new TemplateResource($template))->response()->setStatusCode(Response::HTTP_CREATED);

    }

}
