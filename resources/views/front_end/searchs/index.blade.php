@extends('front_end.layouts.app')


@if(!empty($mainSettings['seo_schema']))
@section('seo_schema')
{!! $mainSettings['seo_schema'] !!}
@endsection
@endif

@section('content')
<main class="main">
    {{ Breadcrumbs::view('front_end.partials.breadcrumbs', 'fe.search',request('q')) }}
    <div class="result result-search">
        <div class="container" @if($posts->isNotEmpty())
            <p> {{ __('Search results for') }} : {{ $q }} </p>
            @else
            <p> {{ __('NO SEARCH RESULTS FOUND FOR') }} : {{ $q }}</p>
            @endif
        </div>
    </div>
    <!-- End of Breadcrumb -->
    @if($posts->isNotEmpty())
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-left" class="col-sm-3 col-md-3">
                    <div class="sp-column custom-class">
                        @if (!empty($parentCategories))
                            @include('front_end.posts.elements.sidebars.parent_category')
                        @endif
                    </div>
                </div>
                <div id="sp-component" class="col-sm-9 col-md-9">
                    <div class="sp-column ">
                        <div id="system-message-container"></div>
                        <div id="k2Container" class="tagView k2ListingTag">
                            <div class="tagItemList">
                                <div class="tagItemView">
                                    @foreach ($posts as $post)
                                        <div class="tagItemBody">
                                            <!-- Item Image -->
                                            <div class="tagItemImageBlock">
                                                <span class="tagItemImage">
                                                    <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}" title="{{ $post->title }}">
                                                        <img alt="{{ $post->title }}" src="{{get_image_url($post->thumbnail, 'default')}}" style="width:600px; height:auto;" />
                                                    </a>
                                                </span>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="tagItemContent">
                                                <div class="tagItemHeader">
                                                    <h2 class="tagItemTitle">
                                                        <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}">{{ $post->title }} </a>
                                                    </h2>
                                                    <span class="tagItemDateCreated">{{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}} </span>
                                                </div>
                                                <div class="tagItemIntroText">
                                                    <p>{{ $post->excerpt }}</p>
                                                </div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                    @endforeach
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="pagination justify-content-center">
                                {{ $posts->links() }}
                            </div>
                            <!-- Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</main>
@endsection
