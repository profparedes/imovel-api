<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        $getRules = [
            'page' => ['integer', 'min:1'],
            'per_page' => ['integer', 'min:1'],
            'order_by' => [
                'in:' . implode(
                    ',',
                    [
                        'id',
                        'title',
                        'type',
                        'rent_value',
                        'sale_value',
                        'total_area',
                        'useful_area',
                        'updated_at'
                    ])
            ],
            'order_direction' => ['in:asc,desc'],
            'is_rent' => ['boolean'],
            'is_sale' => ['boolean'],
            'is_furnished' => ['boolean'],
            'is_pet_friendly' => ['boolean'],
            'has_party_hall' => ['boolean'],
            'has_playground' => ['boolean'],
            'has_square' => ['boolean'],
            'has_gym' => ['boolean'],
            'has_pool' => ['boolean'],
            'search' => ['string'],
            'min_value' => ['integer', 'min:0'],
            'max_value' => ['integer', 'min:0']
        ];

        $postRules = [
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

        $rules = [
            'GET' => $getRules,
            'POST' => $postRules,
            'PUT' => $postRules,
        ];

        return $rules[$request->method()];
    }
}
