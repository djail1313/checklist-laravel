<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\V1\Requests\Templates\UpdateRequest;
use App\Http\V1\Resources\Templates\TemplateResource;
use App\Models\Template;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{

    public function execute(UpdateRequest $request, Template $template)
    {
        DB::transaction(function () use ($request, $template) {
            $template->update($request->getTemplate());
            $this->updateChecklist($template, $request->getChecklist());
            $this->updateItems($template, $request->getItems());
        });
        return new TemplateResource($template);
    }

    protected function updateChecklist(Template $template, ? array $checklist)
    {
        if ($checklist) {
            if ($template->checklist()->count()) {
                $template->checklist()->update($checklist);
            } else {
                $template->checklist()->create($checklist);
            }
        }
    }

    protected function updateItems(Template $template, ? array $items)
    {
        if ($items) {
            $template->items()->delete();
            $template->items()->createMany($items);
        }
    }

}
