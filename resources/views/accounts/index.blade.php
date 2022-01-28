@extends('layouts.app')

@section('page-title', __('List of accounts'))

@section('content')
    <div class="row">
        <div class="col-md">
            @include('accounts.search')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Mobile') }}</th>
                                <th>{{ __('Provider') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $account->id }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->mobile}}</td>
                                    <td>{{ $account->provider}}</td>
                                    <td>{{ $account->created_at }}</td>
                                    <td class="cms-action">
                                        @if($account->block == 0 )
                                            <a href="{{ route('block.account', ['id' => $account->id]) }}" class="btn btn-dark btn-sm">
                                                {{ __('Block') }}
                                            </a>
                                        @else
                                        <a href="{{ route('unblock.account', ['id' => $account->id]) }}" class="btn btn-warning btn-sm">
                                            {{ __('Unblock') }}
                                        </a>
                                        @endif

                                        @can('accounts.destroy')
                                            <a href="javascript:" class="btn btn-danger btn-sm" onclick="deleteResource('{{ route('accounts.destroy', ['account' => $account->id]) }}', '{{ route('accounts.index') }}')">
                                                {{ __('Delete') }}
                                            </a>
                                        @endcan
                                    </td>
                                </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($accounts->hasPages())
                    <div class="card-footer clearfix padding-bottom-0">
                        <div class="pagination-sm m-0 float-right">
                            {{ $accounts->appends(['q' => request('q')])->links() }}
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
