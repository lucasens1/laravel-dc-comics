<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
            // Inserisco le regole
            'title' => ['required','min:3'],
            'sale_date' => ['required'],
            'price' => ['required'],
            'description' => ['min:20'],
            'series' => ['required'],
            'type' => ['required']
        ];
    }
    /* 
    Sovrascrivo la funzione
    */
    public function messages() {
        return [
            'title.required' => 'Il titolo non può essere vuoto',
            'title.min' => 'Inserisci almeno 3 caratteri',
            'sale_date.required' => 'Inserisci una data',
            'price.required' => 'Inserisci un prezzo ex : $5,99',
            'type.required' => 'Seleziona il tipo di fumetto',
            'description.min' => 'Inserisci almeno 20 caratteri',
            'series.required' => 'Inserisci una serie valida'
        ];
    }
}
