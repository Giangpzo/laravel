<?php

namespace App\Modules\Loan\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class RequestLoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => ['required', 'integer'],
            'term' => ['required', 'integer']
        ];
    }
}