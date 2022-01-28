@extends('layouts.app')

@section('page-title', __('List of contacts'))

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
                                <th class="text-center">{{ __('content') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->mobile }}</td>
                                    <td>{{ $contact->content }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        @if ($contact->status == 0)
                                            <a href="{{ route('responded', ['id' => $contact->id]) }}"
                                                class="btn btn-dark btn-sm">
                                                {{ __('no response yet') }}
                                            </a>
                                        @else
                                            <a href="{{ route('noResponseYet', ['id' => $contact->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                {{ __('responded') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($contacts->hasPages())
                    <div class="card-footer clearfix padding-bottom-0">
                        <div class="pagination-sm m-0 float-right">
                            {{ $contacts->appends(['q' => request('q')])->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
