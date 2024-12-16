<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can add custom authorization logic here.
        // For now, allow all users to make this request.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'package_tour_id' => ['required', 'integer', 'exists:package_tours,id'],
            'day' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:65535'],
        ];
    }
}
