<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeSampleSubcategoryRequest extends FormRequest
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
            'home_sample_category_id' => 'exists:home_sample_categories,id',
            'name' => 'string',
            'price' => 'integer',
            'discount' => 'integer',
            'share' => 'integer'
        ];
    }
}
