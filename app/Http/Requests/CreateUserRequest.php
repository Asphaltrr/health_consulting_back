<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
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
        //les règles de validation
        return [
            'nom' => 'require',
            'prenom' => 'require',
            'telephone' => 'require',
            'email' => 'require',
            'cni' => 'require',
            'compteBanque' => 'require',
            'password'=> 'require'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'succes' => false,
            'error' => true,
            'message' => 'erreur de validation',
            'errorslist' => $validator -> errors()
        ]));
    }
}
