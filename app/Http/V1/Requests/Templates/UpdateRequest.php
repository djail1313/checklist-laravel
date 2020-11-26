<?php

namespace App\Http\V1\Requests\Templates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateRequest extends FormRequest
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
        return Arr::only($this->input('data'), ['name']);
    }

    public function getChecklist():? array
    {
        return $this->input('data.checklist');
    }

    public function getItems():? array
    {
        return $this->input('data.items');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.name' => 'required',
            'data.checklist.due_interval' => 'required_with:data.checklist',
            'data.checklist.due_unit' => 'required_with:data.checklist',
            'data.checklist.description' => 'required_with:data.checklist',
            'data.items.*.description' => 'required_with:data.items.*',
            'data.items.*.urgency' => 'required_with:data.items.*',
            'data.items.*.due_interval' => 'required_with:data.items.*',
            'data.items.*.due_unit' => 'required_with:data.items.*',
        ];
    }
}
