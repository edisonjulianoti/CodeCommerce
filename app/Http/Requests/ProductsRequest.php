<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductsRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome precisa de um valor.',
            'name.unique' => 'Esta descrição já esta em uso.',
            'price.required' => 'Campo price precisa de um valor.',
        ];
    }
}
