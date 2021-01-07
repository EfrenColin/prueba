<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TicketRequest extends FormRequest
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

        $rules = [
            'file' => 'mimes:jpg,png',
            'title' => 'required|string|max:64',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['file' => 'required'];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'file' => 'Imagen',
            'title' => 'Titulo',
        ];
    }
}
