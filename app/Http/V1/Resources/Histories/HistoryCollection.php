<?php


namespace App\Http\V1\Resources\Histories;


use App\Http\V1\Resources\CustomResourceCollection;

class HistoryCollection extends CustomResourceCollection
{

    public function getData()
    {
        return HistoryResource::collection($this->collection);
    }

}
