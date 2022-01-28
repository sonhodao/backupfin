@extends('front_end.layouts.app')


@if (!empty($mainSettings['seo_schema']))
    @section('seo_schema')
        {!! $mainSettings['seo_schema'] !!}
    @endsection
@endif

@section('content')
    <main class="main">
        {{ Breadcrumbs::render('fe.post.category', $category) }}

    </main>
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-left" class="col-sm-3 col-md-3">
                    @include('front_end.posts.elements.sidebars.categories')
                </div>
                <div id="sp-component" class="col-sm-9 col-md-9">
                    @include('front_end.posts.elements.post')
                </div>
            </div>
        </div>
    </section>
    
    @push('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".gallery_image_90").fancybox({
                prevEffect: 'none',
                nextEffect: 'none',
                helpers: {
                    thumbs: {
                        width: 50,
                        height: 50
                    },
                }
            });
        });
    </script>

    @endpush
@endsection
