<?php

namespace App\Http\Requests;

use App\Rules\ArrayPrimary;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->can('posts.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'categories' => 'required|array',
            'content' => 'required|string',
            'excerpt' => 'required|string',
            'slug' => 'required|string|max:255',
            'author' => 'nullable|string',
            'status' => 'required|string',
            'published_at' => 'required|date_format:Y-m-d H:i:s',
            'is_hot' => 'nullable|boolean',
            'is_trending' => 'nullable|boolean',
            'is_popular' => 'nullable|boolean',
            'thumbnail' => 'required|string',
            'banner' => 'nullable|string',
            'status' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'required|string|max:20',
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
            'tags' => array_filter(array_map('trim', explode(',', $this->tags))),
            'is_hot' => $this->is_hot ?? false,
            'is_comment' => $this->is_comment ?? false,
            'is_popular' => $this->is_popular ?? false,
            'is_trending' => $this->is_trending ?? false,
            'slug' => $this->slug ?: Str::slug(str_replace('/', '-', $this->title)),
            ]
        );
        if (empty($this->published_at)) {
            $this->merge(
                [
                'published_at' => Carbon::now()->toDateTimeString(),
                ]
            );
        }
    }
}
