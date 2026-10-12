<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DramaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => [
                'required', 'string', 'max:255',
                Rule::unique('dramas')
                    ->where('anio', $this->input('anio'))
                    ->whereNull('deleted_at')
                    ->ignore($this->route('drama')),
            ],
            'sinopsis'     => ['nullable', 'string'],
            'anio'         => ['required', 'integer', 'min:1900', 'max:2100'],
            'estado'       => ['required', 'in:Pendiente,Viendo,Finalizado'],
            'calificacion' => ['nullable', 'numeric', 'between:0,10'],
            'genero_id'    => ['nullable', 'exists:generos,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'anio.required'   => 'El año es obligatorio.',
            'anio.max'        => 'El año no puede ser mayor a 2100.',
            'estado.in'       => 'Elige un estado válido.',
            'calificacion.between' => 'La calificación debe estar entre 0 y 10.',
            'genero_id.exists' => 'Elige un género válido.',
            'titulo.unique' => 'Ya registraste un drama con ese título en ese año.',
        ];
    }
}
