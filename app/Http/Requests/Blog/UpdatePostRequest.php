<?php

namespace App\Http\Requests\Blog;

use App\Enums\Blog\PostStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::In(PostStatus::getValues())
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'title' => [
                'required',
                'string'
            ],
            'content' => [
                'required',
                'string'
            ]
        ];
    }
}
