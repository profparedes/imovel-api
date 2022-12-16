<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:4', 'max:128'],
            'type' => ['required', 'string', 'max:64'],
            'description' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'lat_address' => ['nullable', 'string'],
            'lng_address' => ['nullable', 'string'],
            'district_id' => ['integer', 'required', 'exists:App\Models\District,id'],
            'is_rent' => ['boolean', 'nullable'],
            'is_sale' => ['boolean', 'nullable'],
            //TODO: make condition if is_rent or is_sale is required
            'rent_value' => ['integer', 'nullable'],
            'sale_value' => ['integer', 'nullable'],
            'is_furnished' => ['boolean', 'nullable'],
            'is_pet_friendly' => ['boolean', 'nullable'],
            'bathrooms' => ['integer', 'nullable'],
            'bedrooms' => ['integer', 'nullable'],
            'parking' => ['integer', 'nullable'],
            'total_area' => ['integer', 'nullable'],
            'useful_area' => ['integer', 'nullable'],
            'has_party_hall' => ['boolean', 'nullable'],
            'has_playground' => ['boolean', 'nullable'],
            'has_square' => ['boolean', 'nullable'],
            'has_gym' => ['boolean', 'nullable'],
            'has_pool'=> ['boolean', 'nullable']
        ];
    }
}
