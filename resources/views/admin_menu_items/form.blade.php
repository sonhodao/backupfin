@extends('layouts.app')

@section('page-title', __('Edit Icon Menu'))

@php

@endphp
@section('content')
<form method="post" class="card" action="{{ route('menu_items.update',['id'=>$menuItem->id]) }}">
    @csrf
    <div class="card-header">
        <h3 class="card-title">
            {{ __('Edit Icon Menu: :name', ['name' => $menuItem->label]) }}
        </h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="label">{{ __('Title') }} (<span class="text-danger">*</span>)</label>
            <input
                id="label"
                type="text"
                name="label"
                class="form-control @error('label') is-invalid @enderror"
                value="{{ old('label') ?: (!empty($menuItem) ? $menuItem->label : '') }}"
                required
            />

            @error('label')
            <span class="error invalid-feedback" style="display: block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="link">{{ __('Link') }} (<span class="text-danger">*</span>)</label>
            <input
                id="link"
                type="text"
                name="link"
                class="form-control @error('link') is-invalid @enderror"
                value="{{ old('link') ?: (!empty($menuItem) ? $menuItem->link : '') }}"
                required
            />

            @error('link')
            <span class="error invalid-feedback" style="display: block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="link">{{ __('Sort') }}</label>
            <input
                id="sort"
                type="text"
                name="sort"
                class="form-control @error('sort') is-invalid @enderror"
                value="{{ old('sort') ?: (!empty($menuItem) ? $menuItem->sort : '') }}"
                required
            />

            @error('sort')
            <span class="error invalid-feedback" style="display: block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="text">{{ __('Text') }}</label>
                    <input
                        id="text"
                        type="text"
                        name="text"
                        class="form-control @error('text') is-invalid @enderror"
                        value="{{ old('text') ?: (!empty($menuItem) ? $menuItem->text : '') }}"
                    />

                    @error('text')
                    <span class="error invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="color">{{ __('Color') }}(<span style="font-size: 12px" class="text-danger">*Nếu không chọn hiển thị màu mặc định</span>)</label>
                    <input
                            id="color"
                            type="text"
                            name="color"
                            class="form-control bs-colorpicker @error('color') is-invalid @enderror"
                            value="{{ old('color') ?: (!empty($menuItem) ? $menuItem->color : '') }}"
                    />

                    @error('color')
                    <span class="error invalid-feedback" style="display: block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="image-box">
            <div class="form-group">
                <label for="name">{{ __('Thumbnail') }} </label>
                <div class="form-group">
                    <div class="preview-image-wrapper img-fluid">
                        <img
                            class="preview_image"
                            src="{{ old('thumbnail') ?: (!empty($menuItem) ? $menuItem->thumbnail : '/preview-icon.png') }}"
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
                        value="{{ old('thumbnail') ?: (!empty($menuItem) ? $menuItem->thumbnail : '/preview-icon.png') }}"
                    >
                </div>
                @error('thumbnail')
                <span class="error invalid-feedback" style="display: block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" name="is_home" value="1" id="pin_to_top"
                        @if ($menuItem->is_home ?? true) checked @endif>
                    <label for="pin_to_top">{{__('Is Home ?')}}</label>
                </div>
            </div>
        </div>


    </div>

    <div class="card-footer">
        <div class="float-right">
            <a href="{{ route('menu_items.index') }}" class="btn btn-danger btn-sm">
                {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-primary btn-sm">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>

@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $('.bs-colorpicker').colorpicker();
    </script>
@endpush


@endsection
@include('partials.js.rv_media',['buttonMoreImages'=>[]])
@push('scripts')
    <script>
        function expandCollapse(el) {
            var parent = $(el).parent()

            parent.collapse('show')

            if (parent.parent().hasClass('collapse')) {
                expandCollapse('#' + parent.attr('id'))
            }
        }

        expandCollapse('.cl-active')

        $('.expaned').on('click', function () {
            $('.fa', this).toggleClass('fa-chevron-right').toggleClass('fa-chevron-down')
        })

        $('.prevent-expand').on('click', function (e) {
            e.preventDefault()
            return false
        })
    </script>

    @include('partials.cards.delete')
@endpush
