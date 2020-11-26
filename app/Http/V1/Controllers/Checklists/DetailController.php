<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Checklists\ChecklistResource;
use App\Models\Checklist;

class DetailController extends Controller
{

    public function execute(Checklist $checklist)
    {
        return new ChecklistResource($checklist);
    }

}
