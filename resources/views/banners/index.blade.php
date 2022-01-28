@extends('layouts.app')
@section('page-title', ('List banner'))
@section('content')


    @include('banners.forms.order', ['toggleBtn' => '#order-btn'])
    @include('banners.filter', ['toggleBtn' => '#filter-btn'])

    <div class="card">
        <div class="card-header">
            <div class="card-tools">
               
                <a href="{{ route('banners.create') }}" class="btn btn-success btn-sm">
                    {{ __('Add') }}
                </a>

                <button id="filter-btn" class="btn btn-primary btn-sm">
                    {{ __('Filter') }}
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Thumbnail') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Rel') }}</th>
                        <th>{{ __('Target') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Sort') }}</th>      
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($references as $item)
                        <tr>
                            <td>
                                <img src="{{$item->thumbnail}}" style="height: 2rem;"></td>
                            </td>
                            <td>
                                @if($item->category)
                                    {{$item->category->title}}
                                @endif
                            </td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->link}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->rel}}</td>
                            <td>{{$item->target}}</td>
                            <td>@if ($item->status == 1)
                                <div class="alert alert-success" role="alert">
                                    Kích hoạt                                  
                                </div>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    K.Kích hoạt
                                </div>               
                                @endif
                            </td>  
                            <td>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                            style="max-width: 70px;min-width: 40px;"
                                            type="text"
                                            class="form-control quick-update"
                                            value="{{$item->sort}}"
                                            data-type="sort"
                                            data-id="{{$item->id}}" 
                                            id="sort_{{$item->id}}"          
                                        />
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('banners.edit', ['banner' => $item->id]) }}" class="btn btn-warning btn-sm">
                                    {{ __('Edit') }}
                                </a>

                                <a href="javascript:" 
                                class="btn btn-danger btn-sm" 
                                onclick="deleteResource('{{ route('banners.destroy', ['banner' => $item->id]) }}', '{{ route('banners.index') }}')">
                                    {{ __('Delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($references->hasPages())
            <div class="card-footer clearfix padding-bottom-0">
                <div class="pagination-sm m-0 float-right">
                    {{ $references->appends(['q' => request('q')])->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

@push('footer')
    @include('media::partials.media')
@endpush

@push('styles')
    <style>
        .banner-dp {
            text-align: center;
        }

        .banner-dp img {
            max-width: 100%;
        }
    </style>
@endpush

@push('scripts')
    @include('partials.cards.delete')

    <script>
        $('input[data-bootstrap-switch]').each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $('#toggle_home_banner').on('switchChange.bootstrapSwitch', function(e, state) {
            $('#home_banner_loading').show();

            updateHomeBanner({status: (state ? 1 : 0)})
        });

        $('.btn_gallery').rvMedia({
            onSelectFiles: function(files, element) {

                $('#home_banner_loading').show();

                updateHomeBanner({type: element.data('type'), image: files[0].full_url}, function() {
                    $('#banner-' + element.data('type')).attr('src', files[0].full_url);
                })
            },
        });

        $('.btn_edit_home_banner_link').click(function() {
            let el = $(this);
            let link = prompt('{{ __('Enter link for banner') }}', el.data('current'));

            if (link != null) {
                updateHomeBanner({type: el.data('type'), link: link}, function() {
                    el.data('current', link);
                });
            }
        });

        //Quick update

        $(document).ready(function () {
            $('.quick-update').blur(function () {

                var type = $(this).data('type')
                var id = $(this).data('id')
                if (type == 'sort') {
                    var value = $(this).val()
                } else {
                    var value = $(this).is(':checked') ? 1 : 0
                }
                $.ajax({
                    url: "{{route('banners.quick_update')}}",
                    type: 'POST',
                    data: ({
                        type: type,
                        value: value,
                        id: id
                    }),
                    success: function (data) {
                        if (data.status == 1) {
                            Toast.fire({
                                type: 'success',
                                title: '{{__('Update data successfully.')}}'
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: '{{__('Update error data.')}}'
                            })
                        }
                        removeOverlay()
                    }
                })
            })
        })

    </script>
@endpush
