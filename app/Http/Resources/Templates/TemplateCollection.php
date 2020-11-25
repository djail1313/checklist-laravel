<?php


namespace App\Http\Resources\Templates;

use App\Http\Resources\CustomResourceCollection;

class TemplateCollection extends CustomResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

}
