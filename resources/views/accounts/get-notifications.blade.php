@extends('layouts.app')

@section('page-title', __('List of get notifications'))

@section('content')
    <div class="row">
        <div class="col-md">
            @include('accounts.notifi-search')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Link Sản phẩm') }}</th>
                                <th>{{ __('Created At') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($notifications as $notification)
                                <tr>
                                    <td>{{ $notification->id }}</td>
                                    <td>{{ $notification->email }}</td>
                                    <td>{{ $notification->product->name}}</td>
                                    <td>
                                        <a href="{{ route('fe.product', ['id' => $notification->product->id, 'slug' => $notification->product->slug]) }}" target="blank">{{ route('fe.product', ['id' => $notification->product->id, 'slug' => $notification->product->slug]) }}</a>
                                    </td>
                                    <td>{{ $notification->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($notifications->hasPages())
                    <div class="card-footer clearfix padding-bottom-0">
                        <div class="pagination-sm m-0 float-right">
                            {{ $notifications->appends(['q' => request('q')])->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('partials.cards.delete')
@endpush
