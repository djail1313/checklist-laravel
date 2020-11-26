<?php

namespace App\Http\V1\Requests\Items;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BulkUpdateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data.*.id' => 'required_with:data.*',
            'data.*.action' => 'required_with:data.*',
            'data.*.attributes' => 'required_with:data.*',
        ];
    }
}
