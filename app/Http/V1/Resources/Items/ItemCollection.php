<?php


namespace App\Http\V1\Resources\Items;

use App\Http\V1\Resources\CustomResourceCollection;

class ItemCollection extends CustomResourceCollection
{

    public function getData()
    {
        return ItemResource::collection($this->collection);
    }

}
