@extends('layouts.app')
@section('page-title', ('Newsletter'))
@section('content')
<div class="card">
    <div class="box ">
        <div class="card-header">
            <div class="btn-group">
                <button class="btn btn-primary btn-sm" id="btn_filter">
                    <i class="fa fa-filter"></i>
                    <span>{{__('Filter')}}</span>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id ="filter-box">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__('ID')}}</label>
                            <input name="id" value="{{ request('id') }}" class="form-control" placeholder="{{__('Id')}}">
                        </div>
                    </div>
                    <div class="col-md-4">

                        <!-- Created At -->
                        <div class="form-group">
                            <label>{{__('Created At')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input autocomplete="off" type="text" name="created_at" value="{{ request('created_at') }}" class="form-control float-right" id="reservation">
                            </div>
                        <!-- /.Email -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>{{__('Email')}}</label>
                            <input name="email" value="{{ request('email') }}" class="form-control" placeholder="{{__('Email')}}">
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i> {{__('Apply')}} </button>
                <div class="btn btn-default btn-sm pull-left" id="btn_reset">
                    <a href="{{ url()->current() }}"><i class="fa fa-undo"> {{__('Reset')}}</i></a>
                </div>
            </div>
        </form>
    </div>
</div>

@include('partials.js.filter')

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Time') }}</th>      
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($newsletters as $item)
                    <tr>
                        <td>{{$item -> id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                        <td>
                            <a href="javascript:" 
                                class="btn btn-danger btn-sm" 
                                onclick="deleteResource('{{ route('newsletters.destroy', ['newsletter' => $item->id]) }}', '{{ route('newsletters.index') }}')">
                                    {{ __('Delete') }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
        @if ($newsletters->hasPages())
        <div class="card-footer clearfix padding-bottom-0">
            <div class="pagination-sm m-0 float-right">
                {{ $newsletters->appends(request()->query())->links() }}
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    @include('partials.cards.delete')
@endpush
