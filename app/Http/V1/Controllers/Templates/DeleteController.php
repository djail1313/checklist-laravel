<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DeleteController extends Controller
{

    public function execute(Template $template)
    {
        DB::transaction(function () use ($template) {
            $template->checklist()->delete();
            $template->items()->delete();
            $template->delete();
        });
        return response()
            ->json()
            ->setStatusCode(Response::HTTP_NO_CONTENT);
    }

}
