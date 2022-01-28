@extends('front_end.layouts.app')
@if(!empty($page->seo->schema))
    @section('seo_schema')
    {!! $page->seo->schema !!}
    @endsection
@endif
@section('breadcrumbs')
    {{Breadcrumbs::view('breadcrumbs::json-ld', 'fe.page.show',$page)}}
@stop

@section('content')
<main class="main">
    {{ Breadcrumbs::render('fe.page.show',$page) }}
    <section id="sp-main-body">
        <div class="container">
            <div class="row py-3">
                <div class="col-md col-sm-12">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>        
</main>
@endsection
