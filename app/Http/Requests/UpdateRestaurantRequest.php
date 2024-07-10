<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'url' => ['required', 'url'],
                'name' => ['required'],
                'location' => ['required'],
                'address' => ['required'],
                'number' => [],
                'cuisines' => [],
                // 'timings' => ['required'],
            ];
        } elseif ($method === 'PATCH') {
            return [
                'url' => ['sometimes', 'required', 'url'],
                'name' => ['sometimes', 'required'],
                'location' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'number' => ['sometimes'],
                'cuisines' => ['sometimes'],
                // 'timings' => ['sometimes', 'required'],
            ];
        }
    }
}
