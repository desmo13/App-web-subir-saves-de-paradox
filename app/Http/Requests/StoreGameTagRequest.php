<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Models\GameTag;
class StoreGameTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && $user->can('create', GameTag::class);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tag' => 'required|string|min:3|unique:game_tags,tag',
        ];
    }
}
