<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourPlansRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change this to true to authorize the request.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_tour_id' => [
                'required',
                'integer',
                'exists:package_tours,id',
            ],
            'day' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
                'string',
                'max:65535',
            ],
        ];
    }
}
