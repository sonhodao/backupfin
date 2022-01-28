
@extends('layouts.app')

@section('page-title', !empty($banners) ? __('Edit banner: :title', ['title' => $banners->title]) : __('Create banner'))

@section('content')
    <div class="row">
        <div class="col">
            <form
                class="card"
                action="{{ empty($banners) ? route('banners.store') : route('banners.update', ['banner' => $banners->id]) }}"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
                @if (!empty($banners)) @method('PUT') @endif

                <div class="card-header">
                    <h3 class="card-title">
                        {{ !empty($banners) ? __('Edit banner: :title', ['title' => $banners->title]) : __('Create banner') }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('banners.index') }}" class="btn btn-primary btn-sm">
                            {{ __('List of banners') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}(
                                    <span class="text-danger">*</span>
                                                                   )
                                </label>
                                <input
                                    id="title"
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') ? : (!empty($banners) ? $banners->title : '') }}"

                                />
                                @error('title')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="link">{{ __('Link') }}(
                                    <span class="text-danger">*</span>
                                                                  )
                                </label>
                                <div class="input-group">
                                    <input
                                        id="link"
                                        type="url"
                                        name="link"
                                        class="form-control float-right @error('link') is-invalid @enderror"
                                        value="{{ old('link') ?: (!empty($banners) ? $banners->link : '') }}"
                                    >
                                </div>
                                @error('link')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @php
                            $model = old('model') ?: ($banners->model ?? null);
                            $model_id = old('model_id') ?: ($banners->model_id ?? null);
                        @endphp

                         <div id="category_select" class="form-group">
                            <label for="model_id">
                                {{ __('Category') }}
                            </label>
                            <select
                                name="model_id"
                                id="model_id"
                                data-type="model_id"
                                class="change-group form-control select2bs4"
                            >
                                <option value=""></option>          
                                    @include('partials.forms.category_options', ['selected' => $model_id])                                   
                            </select>
                        </div> 
                        

                            <div class="form-group">
                                <label for="position">{{ __('Position') }}(
                                    <span class="text-danger">*</span>
                                                                   )
                                </label>
                                <select name="position" id="position" class="form-control select2bs4">
                                    <option value=""></option>
                                    @foreach(\App\Models\Banner::POSITION as $position)
                                        <option
                                            value="{{ $position }}"
                                            @if(old('position') == $position || (!empty($banners) && $banners->position == $position)) selected @endif>
                                            {{ __($position) }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('position')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">{{ __('Type') }}(
                                    <span class="text-danger">*</span>
                                                                   )
                                </label>
                                <select name="type" id="type" class="form-control select2bs4">
                                    <option value=""></option>
                                    @foreach(\App\Models\Banner::TYPE as $type)
                                        <option
                                            value="{{ $type }}"
                                            @if(old('type') == $type || (!empty($banners) && $banners->type == $type)) selected @endif>
                                            {{ __($type) }} 
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rel">{{ __('Rel') }}</label>
                                <div class="input-group">
                                    <input
                                        id="rel"
                                        name="rel"
                                        class="form-control float-right @error('rel') is-invalid @enderror"
                                        value="{{ old('rel') ?: (!empty($banners) ? $banners->rel : '') }}"
                                    >
                                </div>
                                @error('rel')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>            

                            <div class="form-group">
                                <label for="target">{{ __('Target') }}</label>
                                <select name="target" id="target" class="form-control select2bs4">
                                    <option value=""></option>
                                    @foreach(config("admin.target") as $target)
                                        <option
                                            value="{{ $target }}"
                                            @if(old('target') == $target || (!empty($banners) && $banners->target == $target)) selected @endif>
                                            {{ __($target) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sort">{{ __('Sort') }}(
                                    <span class="text-danger">*</span>
                                                                   )
                                </label>
                                <input
                                    id="sort"
                                    type="text"
                                    name="sort"
                                    class="form-control @error('sort') is-invalid @enderror"
                                    value="{{ old('sort') ?: (!empty($banners) ? $banners->sort : '0') }}"
                                />
                                @error('sort')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __('Status') }}(
                                    <span class="text-danger">*</span>
                                                                      )
                                </label>
                                <div class="input-group">
                                    <input value="0" type="hidden" name="status">
                                    <input
                                        value="1"
                                        type="checkbox"
                                        name="status"
                                        @if (old('status') == 1 || (old('status') == null && empty($banners)) || (!empty($banners) && $banners->status == 1)) checked
                                        @endif  data-bootstrap-switch
                                        data-off-color="danger"
                                        data-on-color="success"
                                    >
                                </div>
                                @error('status')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6 image-box">
                            <div class="form-group">
                                <label for="name">{{ __('Thumbnail') }} </label>
                                <span class="text-danger">(*)</span>
                                <div class="form-group">
                                    <div class="preview-image-wrapper img-fluid">
                                        <img
                                            class="preview_image"
                                            src="{{ old('thumbnail') ?: (!empty($banners) ? $banners->thumbnail : '/preview-icon.png') }}"
                                        >
                                    </div>
                                </div>
                                <div>
                                    <span class="input-group-btn">
                                        <a
                                            data-result="image"
                                            data-action="select-image"
                                            class="btn_gallery btn btn-primary text-white"
                                        >
                                            <i class="fa fa-picture-o"></i> {{__('Choose')}}
                                        </a>
                                    </span>
                                    <input
                                        style="display:none"
                                        id="thumbnail"
                                        name="thumbnail"
                                        class="image-data form-control @error('thumbnail') is-invalid @enderror"
                                        value="{{ old('thumbnail') ?: (!empty($banners) ? $banners->thumbnail : '') }}"
                                    >
                                </div>
                                @error('thumbnail')
                                <span class="error invalid-feedback" style="display: block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('partials.editors.summernote',['editors'=>['info'],'buttons'=>[]])
@include('partials.js.rv_media',['buttonMoreImages'=>[]])
@include('text_links.js')

@push('scripts')
    <script>
        $(function () {
            $('input[data-bootstrap-switch]').each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'))
            })
            if ($('#type').val() === '{{ \App\Models\Slider::TYPE_MOBILE }}') {
                console.log('hide desktop')
                $('.desktop-only').hide()
            } else {
                console.log('show desktop')
                $('.desktop-only').show()
            }
        })
        $('#type').change(function () {
            let el = $('.desktop-only')
            console.log('change type', $(this).val())
            if ($(this).val() === '{{ \App\Models\Slider::TYPE_MOBILE }}') {
                console.log('hide desktop')
                el.hide()
            } else {
                console.log('show desktop')
                el.show()
            }
        })
    </script>
@endpush
