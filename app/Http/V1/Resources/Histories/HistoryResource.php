<?php

namespace App\Http\V1\Resources\Histories;

use App\Http\V1\Resources\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HistoryResource extends BaseResource
{

    public function getAttributes(Request $request): array
    {
        return $this->resource->toArray();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType(): string
    {
        return 'history';
    }

    public function getLink(): string
    {
        return route('histories.detail', ['history' => $this->getId()]);
    }

    public function getItemsRelationships()
    {
        return new ItemsRelationship($this->items);
    }
}
