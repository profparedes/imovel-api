<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StateRequest extends FormRequest
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
            'order_by' => ['in:id,name'],
            'order_direction' => ['in:asc,desc'],
        ];

        $postRules = [
            'name' => ['required', 'max:64'],
            'UF' => ['required', 'max:2'],
        ];

        $rules = [
            'GET' => $getRules,
            'POST' => $postRules,
            'PUT' => $postRules,
        ];

        return $rules[$request->method()];
    }
}
