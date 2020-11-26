<?php

namespace App\Http\V1\Requests\Items;

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
        $data = $this->input('data.attribute');
        $data['due'] = Carbon::createFromTimeString($data['due']);
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.attribute.due' => 'required',
            'data.attribute.urgency' => 'required',
            'data.attribute.assignee_id' => 'required',
            'data.attribute.description' => 'required',
        ];
    }
}
