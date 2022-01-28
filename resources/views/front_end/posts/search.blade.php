@extends('front_end.layouts.app')


@if(!empty($mainSettings['seo_schema']))
    @section('seo_schema')
        {!! $mainSettings['seo_schema'] !!}
    @endsection
@endif

@section('content')
<main class="main">

   {{ Breadcrumbs::render('fe.post.index') }}

    <div class="result">
        <div class="container"
            @if($posts->isNotEmpty())
                <p> {{ __('Search results for') }} : {{ $q }}</p>
            @else
                <p> {{ __('NO SEARCH RESULTS FOUND FOR') }} : {{ $q }}</p>
            @endif
        </div>
    </div>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    @include('front_end.posts.elements.list_post',['posts'=>$posts])
                    <div class="pagination justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Start Sidebar -->
                @include('front_end.posts.elements.sidebar')
                <!-- End Sidebar -->


            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection

