<?php

namespace App\Http\V1\Resources\Templates;

use App\Http\V1\Resources\BaseResource;
use Illuminate\Http\Request;

class TemplateResource extends BaseResource
{

    public function getAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'checklist' => $this->checklist,
            'items' => $this->items,
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType(): string
    {
        return 'templates';
    }

    public function getLink(): string
    {
        return route('templates.detail', ['template' => $this->getId()]);
    }
}
