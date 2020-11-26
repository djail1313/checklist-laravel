<?php


namespace App\Http\V1\Controllers\Checklists;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Checklists\CreateRequest;
use App\Http\V1\Resources\Checklists\ChecklistResource;
use App\Models\Checklist;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CreateController extends Controller
{

    public function execute(CreateRequest $request)
    {
        $checklist = null;

        DB::transaction(function () use ($request, &$checklist) {
            /** @var Checklist $checklist */
            $checklist = Checklist::create($request->getData());
            if ($request->getItems()->count()) {
                $checklist->items()->createMany(
                    $request->getItems()->map(function ($item) {
                        return [
                            'description' => $item,
                        ];
                    })
                );
            }
        });

        return (new ChecklistResource(Checklist::find($checklist->id)))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

}
