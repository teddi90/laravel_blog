<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'=>'required|string',
            'content'=>'required|string',
            'preview_image'=>'nullable|file',
            'main_image'=>'nullable|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'This field is required',
            'title.string'=>'data must be type of string',
            'content.required'=>'This field is required',
            'content.string'=>'data must be type of string',
            'preview_image.required'=>'This field is required',
            'preview_image.file'=>'Choose the file',
            'main_image.required'=>'This field is required',
            'main_image.file'=>'Choose the file',
            'category_id.required'=>'This field is required',
            'category_id.integer'=>'data must be a number',
            'category_id.exist'=>'Category must exist',
            'tag_ids.array'=>'Data must be array',
        ];
    }
}
