<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.*.url' => ['required', 'url'],
            'data.*.name' => ['required'],
            'data.*.location' => ['required'],
            'data.*.address' => ['required'],
            'data.*.number' => [],
            'data.*.cuisines' => [],
            // 'timings' => ['required'],
        ];
    }
}