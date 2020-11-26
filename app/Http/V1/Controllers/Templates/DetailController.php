<?php


namespace App\Http\V1\Controllers\Templates;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Templates\TemplateResource;
use App\Models\Template;

class DetailController extends Controller
{

    public function execute(Template $template)
    {
        return new TemplateResource($template);
    }

}
