@extends('layouts.app')

@section('page-title', __('Home Text Settings'))

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('home_texts.update') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">
                                @foreach ($homeTexts as $row)
                                    @if ($row->text_type == 'checkbox')
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" name="{{ $row->text_name }}" value="1"
                                                    id="{{ $row->text_name }}" @if ($row->text_value == 1) checked @endif>
                                                <label for="{{ $row->text_name }}">{{ __($row->text_name) }}</label>
                                            </div>
                                        </div>
                                    @elseif($row->text_type=='upload')
                                        <div class="col-md-12 image-box">
                                            <label for="exampleInputEmail1">{{ __($row->text_name) }}</label>
                                            <span class="text-danger mb-2">
                                                ({{ __('Recommend Size: :size', ['size' => '1206x1344']) }})
                                            </span>

                                            <div class="form-group">
                                                <div class="preview-image-wrapper img-fluid" @if ($row->text_name == 'logo') style="background:#cd1818" @endif>
                                                    <img @if ($row->text_name == 'logo') style="height: auto;" @endif class="preview_image"
                                                        src="{{ !empty($row->text_value) ? $row->text_value : '/preview-icon.png' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <span class="input-group-btn">
                                                        <a data-result="image" data-action="select-image"
                                                            class="btn_gallery btn btn-primary text-white">
                                                            <i class="fa fa-picture-o"></i> {{ __('Choose') }}
                                                        </a>
                                                    </span>
                                                    <input name="{{ $row->text_name }}" type="hidden"
                                                        class="image-data form-control"
                                                        value="{{ !empty($row->text_value) ? $row->text_value : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __($row->text_name) }}</label>
                                            @if ($row->text_type == 'textarea')
                                                @if ($row->text_name == 'popup')
                                                    <div style="height: 34px;">
                                                        <span class="editor-action-item" style="">
                                                            <a href="#" class="btn_gallery btn btn-primary"
                                                                data-result="{{ $row->text_name }}" data-multiple="true"
                                                                data-action="media-insert-ckeditor">
                                                                <i class="far fa-image"></i>
                                                                Thêm tập tin
                                                            </a>
                                                        </span>
                                                    </div>
                                                @endif
                                                <textarea name="{{ $row->text_name }}" class="form-control" rows="5"
                                                    placeholder="Enter ...">{{ $row->text_value }}</textarea>
                                            @else
                                                @if ($row->text_type == 'color')
                                                    <input id="color" type="text" name="{{ $row->text_name }}"
                                                        value="{{ $row->text_value }}"
                                                        class="form-control bs-colorpicker"
                                                     />


                                                @else
                                                    <input type="text" name="{{ $row->text_name }}"
                                                        value="{{ $row->text_value }}" class="form-control"
                                                        placeholder="{{ __($row->text_name) }}">
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush
@push('scripts')
    @include('partials.js.rv_media',['buttonMoreImages'=>[]])
    @include('partials.editors.summernote',['editors'=>['popup','post_description'],'buttons'=>[],'realButtons'=>[]])
    <script src="{{ asset('theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $('.bs-colorpicker').colorpicker();
    </script>
@endpush

