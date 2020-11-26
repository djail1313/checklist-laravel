<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Checklists\UpdateRequest;
use App\Http\V1\Resources\Checklists\ChecklistResource;
use App\Models\Checklist;

class UpdateController extends Controller
{

    public function execute(UpdateRequest $request, Checklist $checklist)
    {
        if ($request->getData()) {
            $checklist->update($request->getData());
        }

        return new ChecklistResource($checklist);
    }

}
