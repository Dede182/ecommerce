<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'category_id' => 'required',
            'price' => 'required|numeric|max:10000',
            'description' => 'required|min:3|max:10000',
            'featured_image' => 'nullable|file|mimes:png,jpg|max:2000',
            // 'productImages' => 'nullable|file|mimes:png,jpg|max:2000',
            // 'productImages.*' => 'nullable|file|mimes:png,jpg|max:2000',
        ];
    }
}
