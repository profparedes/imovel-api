<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CityRequest extends FormRequest
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
            'order_by' => ['in:id,name'],
            'order_direction' => ['in:asc,desc'],
            'search' => ['string']
        ];

        $postRules = [
            'name' => ['required', 'max:64'],
            'state_id' => ['required', 'integer', 'exists:App\Models\State,id'],
        ];

        $rules = [
            'GET' => $getRules,
            'POST' => $postRules,
            'PUT' => $postRules,
        ];

        return $rules[$request->method()];
    }
}
