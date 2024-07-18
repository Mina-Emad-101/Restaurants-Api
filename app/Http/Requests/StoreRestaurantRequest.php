<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // $user = $this->user();
        //
        // return $user && $user->tokenCan('create');
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
            'url' => ['required', 'url'],
            'name' => ['required'],
            'location' => ['required'],
            'address' => ['required'],
            'number' => [],
            'cuisines' => [],
            'timings' => ['array:sat,sun,mon,tue,wed,thu,fri'],
            'timings.*' => ['required_with:timings', 'regex:/[0-9:]* [ap]m - [0-9:]* [ap]m/i'],
        ];
    }
}
