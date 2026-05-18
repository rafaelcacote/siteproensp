<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNoticiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->input('slug') === '') {
            $this->merge(['slug' => null]);
        }
        if ($this->input('publicado_em') === '') {
            $this->merge(['publicado_em' => null]);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('noticias', 'slug')],
            'conteudo' => ['required', 'string'],
            'imagem_destaque' => ['nullable', 'image', 'max:2048'],
            'publicado_em' => ['nullable', 'date'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'titulo' => 'título',
            'slug' => 'slug',
            'conteudo' => 'conteúdo',
            'imagem_destaque' => 'imagem de destaque',
            'publicado_em' => 'data de publicação',
        ];
    }
}
