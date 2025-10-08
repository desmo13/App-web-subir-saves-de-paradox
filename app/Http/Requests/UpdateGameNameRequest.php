<?php

namespace App\Http\Requests;

use App\Models\GameName;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameNameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && $user->can('update', GameName::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|unique:game_names,name,'.$this->route('game_name')->id,
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.min'      => 'El nombre debe tener al menos 3 caracteres.',
            'name.unique'   => 'Este nombre de juego ya existe.',
        ];
    }
}
