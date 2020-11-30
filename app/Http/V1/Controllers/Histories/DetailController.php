<?php


namespace App\Http\V1\Controllers\Histories;


use App\Http\Controllers\Controller;
use App\Http\V1\Resources\Histories\HistoryResource;
use App\Models\History;

class DetailController extends Controller
{


    public function execute(History $history)
    {
        return new HistoryResource($history);
    }

}
