<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Stagiaire extends FormRequest
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
            'cin' => 'required|max:10',
            'nom' => 'required',
            'tel' => 'required|min:10|max:13',
            'sexe' => 'required|min:1|max:7',
            'adresse'=> 'required|max:255',
            'email' => 'email|required',
            'nom_utilisateur' => 'required',
        ];
    }
}
