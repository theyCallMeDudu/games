<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'title'=>'required',
            'genre'=>'required',
            'price'=>'numeric'
        ];
    }

    public function messages(){
        return[
            'title.required' => 'O campo título é obrigatório',
            'body.required'  => 'Preencha os campos obrigatórios',
            'price.numeric' => 'O campo preço aceita somente números'
        ];
    }
}
