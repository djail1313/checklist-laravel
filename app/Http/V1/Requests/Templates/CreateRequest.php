<?php

namespace App\Http\V1\Requests\Templates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function getTemplate(): array
    {
        return Arr::only($this->input('data.attributes'), ['name']);
    }

    public function getChecklist():? array
    {
        return $this->input('data.attributes.checklist');
    }

    public function getItems(): array
    {
        return $this->input('data.attributes.items') ?? [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.attributes.name' => 'required',
            'data.attributes.checklist.due_interval' => 'required_with:data.attributes.checklist',
            'data.attributes.checklist.due_unit' => 'required_with:data.attributes.checklist',
            'data.attributes.checklist.description' => 'required_with:data.attributes.checklist',
            'data.attributes.items.*.description' => 'required_with:data.attributes.items.*',
            'data.attributes.items.*.urgency' => 'required_with:data.attributes.items.*',
            'data.attributes.items.*.due_interval' => 'required_with:data.attributes.items.*',
            'data.attributes.items.*.due_unit' => 'required_with:data.attributes.items.*',
        ];
    }
}
