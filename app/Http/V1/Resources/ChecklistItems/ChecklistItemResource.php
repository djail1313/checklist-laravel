<?php


namespace App\Http\V1\Resources\ChecklistItems;

use App\Http\V1\Resources\BaseResource;
use Illuminate\Http\Request;

class ChecklistItemResource extends BaseResource
{

    public function getAttributes(Request $request): array
    {
        $this->resource->items;
        return $this->resource->toArray();
    }

    public function getType(): string
    {
        return 'checklists';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLink(): string
    {
        return route('checklists.detail', ['checklist' => $this->getId()]);
    }
}
