<?php


namespace App\Http\V1\Resources\Templates;

use App\Http\V1\Resources\CustomResourceCollection;

class TemplateCollection extends CustomResourceCollection
{

    public function getData()
    {
        return $this->collection;
    }

}
