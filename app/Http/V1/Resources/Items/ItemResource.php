<?php

namespace App\Http\V1\Resources\Items;

use App\Http\V1\Resources\BaseResource;
use Illuminate\Http\Request;

class ItemResource extends BaseResource
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
        return 'items';
    }

    public function getLink(): string
    {
        return route('checklists.detail', ['checklist' => $this->getId()]);
    }
}
