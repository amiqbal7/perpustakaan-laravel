<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanLogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'book_id' => ['required', 'integer'],
            // 'loan_date' => ['required', 'string', 'max: 255'],
            // 'return_date' => ['required', 'string', 'max: 255'],
            // 'actual_return_date' => ['required', 'string', 'max: 255'],



        ];
    }
}
