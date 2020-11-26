<?php

namespace App\Http\V1\Resources\Checklists;

use App\Http\V1\Resources\BaseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ChecklistResource extends BaseResource
{

    public function getAttributes(Request $request): array
    {
        return Arr::except($this->resource->toArray(), 'items');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType(): string
    {
        return 'checklists';
    }

    public function getLink(): string
    {
        return route('checklists.detail', ['checklist' => $this->getId()]);
    }

    public function getItemsRelationships()
    {
        return new ItemsRelationship($this->items);
    }
}
