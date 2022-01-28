<div class="form-group">
    <label for="title">{{ __('Title') }}</label>
    <span class="text-danger">(*)</span>
    <input
        id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title') ?: (!empty($currentCategory) ? $currentCategory->title : '') }}" required
    />

    @error('title')
    <span class="error invalid-feedback" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="slug">{{ __('Slug') }}</label>
    (
    <span class="text-danger">*</span>
    )
    <input
        id="slug"
        name="slug"
        class="form-control @error('slug') is-invalid @enderror"
        value="{{ old('slug') ?: (!empty($currentCategory) ? $currentCategory->slug : '') }}"
    />
    @error('slug')
    <span class="error invalid-feedback" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="row">
    <div class="col-6 form-group image-box">
        <label for="thumbnail">{{ __('Thumbnail') }}</label>
        <span class="text-danger">({{__('Recommend Size: :size', ['size' => '270x138'])}})</span>
        <div class="input-group justify-content-center">
            <div class="preview-image-wrapper ld-img-preview">
                <img
                    class="preview_image"
                    src="{{ old('thumbnail') ?: (!empty($currentCategory) ? $currentCategory->thumbnail : '/preview-icon.png') }}"
                >
            </div>
            <span>
                <a data-result="image" data-action="select-image" class="btn_gallery btn btn-primary text-white">
                    <i class="fa fa-picture-o"></i> {{__('Choose')}}
                </a>
            </span>
            <input
                type="hidden" id="thumbnail" name="thumbnail"
                class="image-data form-control @error('title') is-invalid @enderror"
                value="{{ old('thumbnail') ?: (!empty($currentCategory) ? $currentCategory->thumbnail : '') }}"
            >
        </div>

        @error('thumbnail')
        <span class="error invalid-feedback" style="display: block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="col-6 form-group image-box">
        <label for="thumbnail">{{ __('Banner post') }}</label>
        <div class="input-group justify-content-center">
            <div class="preview-image-wrapper ld-img-preview">
                <img
                    class="preview_image"
                    src="{{ old('banner') ?: (!empty($currentCategory) ? $currentCategory->banner : '/preview-icon.png') }}"
                >
            </div>
            <span>
                <a data-result="image" data-action="select-image" class="btn_gallery btn btn-primary text-white">
                    <i class="fa fa-picture-o"></i> {{__('Choose')}}
                </a>
                <a class="btn_remove_image btn btn-primary text-white" > <i class="fa fa-trash-alt"></i></a>
            </span>
            <input
                type="hidden" id="banner" name="banner"
                class="image-data form-control @error('title') is-invalid @enderror"
                value="{{ old('banner') ?: (!empty($currentCategory) ? $currentCategory->banner : '') }}"
            >
        </div>

        @error('banner')
        <span class="error invalid-feedback" style="display: block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="description">{{ __('Description') }}</label>
    <textarea
        id="description" name="description"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('title') ?: (!empty($currentCategory) ? $currentCategory->description : '') }}</textarea>

    @error('description')
    <span class="error invalid-feedback" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="parent_id">{{ __('Parent') }}</label>
    <select id="parent_id" name="parent_id" class="form-control select2bs4 @error('parent_id') is-invalid @enderror">
        <option value="">{{ __('No parent') }}</option>
        @include('partials.forms.category_options', ['selected' => (old('parent_id'))?:(!empty($currentCategory) ?$currentCategory->parent_id : null)])
        )
    </select>

    @error('parent_id')
    <span class="error invalid-feedback" style="display: block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="status">{{ __('Status') }}</label>
    <select
        name="status"
        id="status"
        class="form-control select2bs4 @error('status') is-invalid @enderror"
        required
    >
        @foreach(\App\Models\Category::STATUS as $status => $label)
            <option
                value="{{ $status }}"
                @if(old('status') == $status || (!empty($currentCategory) && $currentCategory->status == $status)) selected @endif>
                {{ __("post.status.$label") }}
            </option>
        @endforeach
    </select>

    @error('status')
    <span class="error invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="col-md-4">
    <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
            <input type="checkbox" id="is_menu_bottom" name="is_menu_bottom" value="1" @if (old('is_menu_bottom') == 1 || (!empty($currentCategory) && $currentCategory->is_menu_bottom == 1)) checked @endif>
            <label for="is_menu_bottom">
                {{ __('Is_Bottom?') }}
            </label>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
            <input type="checkbox" id="is_menu_popular" name="is_menu_popular" value="1" @if (old('is_menu_popular') == 1 || (!empty($currentCategory) && $currentCategory->is_menu_popular == 1)) checked @endif>
            <label for="is_menu_popular">
                {{ __('Is_Popular') }}
            </label>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group clearfix">
        <div class="icheck-primary d-inline">
            <input type="checkbox" id="is_menu_home" name="is_menu_home" value="1" @if (old('is_menu_home') == 1 || (!empty($currentCategory) && $currentCategory->is_menu_home == 1)) checked @endif>
            <label for="is_menu_home">
                {{ __('Is_Home?') }}
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('partials.forms.seo', ['model' => !empty($currentCategory) ? $currentCategory:null])
    </div>
</div>
@include('partials.forms.slug', [
    'fromElement' => '#title',
    'toElement' => '#slug',
])
@include('partials.js.rv_media',['buttonMoreImages'=>[]])
@include('partials.editors.summernote',['editors'=>['description'],'buttons'=>[],'realButtons'=>[]])
