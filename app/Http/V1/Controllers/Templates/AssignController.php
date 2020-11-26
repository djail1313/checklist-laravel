<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Templates\AssignRequest;
use App\Http\V1\Resources\Templates\ChecklistCollection;
use App\Models\Checklist;
use App\Models\Template;
use Symfony\Component\HttpFoundation\Response;

class AssignController extends Controller
{

    public function execute(AssignRequest $request, Template $template)
    {
        $checklist_ids = collect();
        foreach ($request->iterateData() as $data) {
            if ($checklist = $template->assign($data)) {
                $checklist_ids->push($checklist->id);
            }
        }
        return (new ChecklistCollection(
            Checklist::with('items')
                ->whereIn('id', $checklist_ids)
                ->get()
        ))->response()->setStatusCode(Response::HTTP_CREATED);
    }

}
