<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreLibro extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'file' => array('required', 'unique:libros', 'regex:#\.(?:pdf|epub)$#'),
        ];
    }

    // Sobrescribimos la función
    public function messages()
    {
        return [
            'name.required' => 'El campo name es requerido',
            'file.required' => 'El campo file es requerido',
            'file.unique' => 'Este archivo ya existe',
            'file.regex' => 'Este archivo debe tener extensión .pdf o .epub',
        ];
    }

    // Sobrescribimos la función
    protected function failedValidation(Validator $validator)
    { 
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(jsend_fail($errors));
    } 
}
