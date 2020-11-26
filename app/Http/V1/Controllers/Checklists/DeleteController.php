<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Checklists\ChecklistResource;
use App\Models\Checklist;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends Controller
{

    public function execute(Checklist $checklist)
    {
        DB::transaction(function () use ($checklist) {
            $checklist->items()->delete();
            $checklist->delete();
        });
        return response()->json()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

}
