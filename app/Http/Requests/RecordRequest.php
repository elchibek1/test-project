<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['date', 'required', 'bail'],
            'kind' => ['required', 'bail'],
            'category_id' => ['required', 'bail'],
            'total' =>  ['required', 'bail', 'numeric'],
            'comment' => ['nullable', 'max:250'],
            'user_id' => ['required', 'bail']
        ];
    }
}
