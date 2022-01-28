@extends('layouts.app')

@section('page-title', __('List of posts'))

@section('content')
    <div class="row">
        <div class="col-md">

            @include('posts.search')

            <div class="card">

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Info') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th class="text-nowrap">{{ __('Sort') }}</th>
                                <th width="10">{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td><img src="{{$row->thumbnail}}" style="height: 5rem;"></td>
                                    <td style="white-space: normal;">
                                        <b>{{ $row->title }}</b>
                                        <br>
                                        @if(!empty($row->categories))
                                            {{__('Category')}}:
                                            @foreach ($row->categories as $item)
                                                              -
                                            <span>{{ $item->title }}</span>
                                            <br>
                                            @endforeach
                                        @endif
                                        {{ __('Author') }}: {{ $row->author }}
                                        <br>

                                        Ngày tạo:
                                        <b>{{$row->created_at}}</b>
                                        <br/>

                                        Ngày publish:
                                        <b>{{$row->published_at}}</b>
                                        <br/>


                                        <a
                                            target="_blank"
                                            href="{{ route('fe.post',["slug"=>$row->slug,'id'=>$row->id]) }}"
                                        > Link xem chi tiết
                                        </a>
                                    </td>
                                    
                                    <td>{{ __("post.status.".$postStatus[$row->status]) }}</td>
                                    <td>{{ formatDateTimeShow($row->created_at) }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input
                                                        style="max-width: 70px;"
                                                        type="text"
                                                        class="form-control quick-update"
                                                        value="{{ $row->sort }}"
                                                        data-type="sort"
                                                        data-id="{{ $row->id }}"
                                                        id="sort_{{ $row->id }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group clearfix margin-bottom-10">
                                                    @if(empty($typeDelete))
                                                    @can('posts.update')
                                                        <a
                                                            href="{{ route('posts.edit', ['post' => $row->id]) }}"
                                                            class="btn btn-warning btn-sm"
                                                        >
                                                            {{ __('Edit') }}
                                                        </a>
                                                    @endcan
                                                    @can('posts.destroy')
                                                        <a
                                                            href="javascript:"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="deleteResource('{{ route('posts.delete', ['post' => $row->id]) }}', '{{ route('posts.index') }}')"
                                                        >
                                                            {{ __('Trash') }}
                                                        </a>
                                                    @endcan
                                   
                                                @else
                                                         <a
                                                            href="javascript:"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="deleteResource('{{ route('posts.destroy', ['post' => $row->id]) }}', '{{ route('posts.index') }}')"
                                                        >
                                                            {{ __('Delete') }}
                                                        </a>
                                                    <a href="javascript:" class="btn btn-warning btn-sm restore_btn_dtb" data-url="{{route('posts.delete.restore',['id'=>$row->id])}}">
                                                        {{ __('Restore') }}
                                                    </a>
                                                @endif
                                                </div>
                                            </div>
                                            @if(empty($typeDelete))
                                            <div class="col-md-12">
                                                <div class="form-group clearfix margin-bottom-10">
                                                    <div class="icheck-primary d-inline">
                                                        <input
                                                            class="quick-update"
                                                            data-type="is_popular"
                                                            type="checkbox"
                                                            data-id="{{ $row->id }}"
                                                            id="is_popular_{{ $row->id }}"
                                                            @if ($row->is_popular ?? false) checked @endif>
                                                        <label for="is_popular_{{ $row->id }}">{{ __('Is Popular?') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group clearfix margin-bottom-10">
                                                    <div class="icheck-primary d-inline">
                                                        <input
                                                            class="quick-update"
                                                            data-type="is_hot"
                                                            type="checkbox"
                                                            data-id="{{ $row->id }}"
                                                            id="is_hot_{{ $row->id }}"
                                                            @if ($row->is_hot ?? false) checked @endif>
                                                        <label for="is_hot_{{ $row->id }}">{{ __('Is Hot?') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group clearfix margin-bottom-10">
                                                    <div class="icheck-primary d-inline">
                                                        <input
                                                            class="quick-update"
                                                            data-type="is_trending"
                                                            type="checkbox"
                                                            data-id="{{ $row->id }}"
                                                            id="is_trending_{{ $row->id }}"
                                                            @if ($row->is_trending ?? false) checked @endif>
                                                        <label for="is_trending_{{ $row->id }}">{{ __('Is Trending?') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group clearfix margin-bottom-10">
                                                    <div class="icheck-primary d-inline">
                                                        <input
                                                            class="quick-update"
                                                            data-type="is_comment"
                                                            type="checkbox"
                                                            data-id="{{ $row->id }}"
                                                            id="is_comment_{{ $row->id }}"
                                                            @if ($row->is_comment ?? false) checked @endif>
                                                        <label for="is_comment_{{ $row->id }}">{{ __('Bình luận') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($posts->hasPages())
                    <div class="card-footer clearfix padding-bottom-0">
                        <div class="pagination-sm m-0 float-right">
                            {{ $posts->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('partials.cards.delete')
    <script>
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
                    url: "{{route('posts.quick_update')}}",
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
        $(document).on('click','.restore_btn_dtb',function(e){
                e.preventDefault();
                let url = $(this).attr('data-url');
                $.post(url,function (data) {
                    if (data.status == 1) {
                        Toast.fire({
                            type: 'success',
                            title: '{{__('Restore data successfully.')}}',
                        })
                        window.location.reload();
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: '{{__('Restore error data.')}}',
                        })
                    }
                })
            })
    </script>
@endpush