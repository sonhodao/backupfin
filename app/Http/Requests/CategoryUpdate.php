<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('categories.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100|unique:categories,title,' . $this->category->id,
            'description' => 'nullable|string',
            'thumbnail' => 'required|string',
            'banner' => 'nullable|string',
            'slug' => 'required|string|max:100|unique:categories,slug,' . $this->category->id,
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'required|string',
            'is_menu_bottom' => 'nullable|boolean',
            'is_menu_popular' => 'nullable|boolean',
            'is_menu_home' => 'nullable|boolean',
            'seo' => 'nullable|array',
            'seo.title' => 'nullable|string|max:100',
            'seo.keyword' => 'nullable|string|max:255',
            'seo.canonical' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string',
            'seo.image' => 'nullable|string',
            'seo.robots' => 'nullable|string',
            'seo.schema' => 'nullable|string',
            'seo.index' => 'nullable|boolean',
            'seo.nofollow' => 'nullable|boolean',
            'seo.noimageindex' => 'nullable|boolean',
            'seo.noindex' => 'nullable|boolean',
            'seo.noarchive' => 'nullable|boolean',
            'seo.nosnippet' => 'nullable|boolean',
            'seo.follow' => 'nullable|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
            'slug' => $this->slug ?: Str::slug($this->title),
            'is_menu_bottom' => $this->is_menu_bottom ?? false,
            'is_menu_popular' => $this->is_menu_popular ?? false,
            'is_menu_home' => $this->is_menu_home ?? false,
            ]
        );
    }
}
