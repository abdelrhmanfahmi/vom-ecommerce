<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|min:2|max:100',
            'name_en' => 'required|min:2|max:100',
            'description_ar' => 'required|min:3|max:10000',
            'description_en' => 'required|min:3|max:10000',
            'price' => 'required|numeric|min:1|max:100000',
            'store_id' => 'required|exists:stores,id',
        ];
    }
}
