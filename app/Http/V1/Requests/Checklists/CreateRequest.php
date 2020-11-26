<?php

namespace App\Http\V1\Requests\Checklists;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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

    public function getData(): array
    {
        $data = $this->input('data.attributes');
        $data['due'] = Carbon::createFromTimeString($data['due']);
        return Arr::except($data, 'items');
    }

    public function getItems(): Collection
    {
        return collect($this->input('data.attributes.items'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.attributes.object_domain' => 'required',
            'data.attributes.object_id' => 'required',
            'data.attributes.due' => 'required',
            'data.attributes.urgency' => 'required',
            'data.attributes.task_id' => 'required',
            'data.attributes.description' => 'required',
        ];
    }
}
