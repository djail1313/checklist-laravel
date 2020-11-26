<?php

namespace App\Http\V1\Requests\Templates;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class AssignRequest extends FormRequest
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

    public function iterateData(): \Generator
    {
        foreach ($this->input('data') as $datum) {
            yield $datum['attributes'];
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.*.attributes.object_id' => 'required_with:data.attributes',
            'data.*.attributes.object_domain' => 'required_with:data.attributes',
        ];
    }
}
