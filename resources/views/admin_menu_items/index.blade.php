@extends('layouts.app')

@section('page-title', __('List of Menu Items'))

@section('content')
    <div class="row">
        <div class="col-md">
            @include('admin_menu_items.search')
            <div class="card">

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Link') }}</th>
                                <th>{{ __('Text') }}</th>
                                <th>{{ __('Color') }}</th>
                                <th>{{ __('Sort') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($menuItems as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->label }}</td>
                                <td>{{ $row->link }}</td>
                                <td>{{ $row->text }}</td>
                                <td>{{ $row->color }}</td>
                                <td>{{ $row->sort }}</td>
                                <td>
                                    <a
                                        href="{{ route('menu_items.edit', ['id' => $row->id]) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        {{ __('Edit') }}
                                    </a>
                                    <div class="form-group clearfix margin-bottom-10 mt-3">
                                        <div class="icheck-primary d-inline">
                                            <input
                                                class="quick-update"
                                                data-type="is_home"
                                                type="checkbox"
                                                data-id="{{ $row->id }}"
                                                id="is_home{{ $row->id }}"
                                                @if ($row->is_home ?? true) checked @endif>
                                            <label for="is_home{{ $row->id }}">{{ __('Is Home ?') }}</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix padding-bottom-0">
                    <div class="float-right">
                        {!! $menuItems->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
                url: "{{route('menu_items.quick_update')}}",
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
