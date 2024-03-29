<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $method = $this->method();

        if ($method == 'PUT') {

            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['required', 'email'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'zip' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes','required'],
                'type' => ['sometimes','required', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['sometimes','required', 'email', Rule::unique('customers')->ignore($this->customer)],
                'address' => ['sometimes','required'],
                'city' => ['sometimes','required'],
                'state' => ['sometimes','required'],
                'zip' => ['sometimes','required'],
            ];
        }
    }
}
