@extends('front_end.layouts.app')


@if (!empty($mainSettings['seo_schema']))
@section('seo_schema')
{!! $mainSettings['seo_schema'] !!}
@endsection
@endif

@section('content')
<main class="main">
    {{ Breadcrumbs::view('front_end.partials.breadcrumbs', 'fe.post', $post) }}

    <section id="sp-main-body" class="page-detail">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container"></div>
                        <span id="startOfPageId12"></span>
                        <div id="k2Container" class="itemView">
                            <div class="itemHeader">
                                <h2 class="itemTitle"> {!! $post->title !!} </h2>
                            </div>
                            <div class="itemBody">
                                <div class="itemIntroText">{!! $post->excerpt !!}</div>
                                <div class="itemFullText">{!! $post->content !!}</div>
                                <div class="clr"></div>
                                <div class="itemContentFooter">
                                    <div class="clr"></div>
                                </div>
                            </div>

                            <!-- Social sharing -->
                            <div class="itemSocialSharing">
                                <!-- Twitter Button -->
                                <div class="itemTwitterButton">
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en-gb" data-via="">Tweet</a>
                                    <script>
                                        ! function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0]
                                                , p = /^http:/.test(d.location) ? 'http' : 'https';
                                            if (!d.getElementById(id)) {
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = p + '://platform.twitter.com/widgets.js';
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }
                                        }(document, 'script', 'twitter-wjs');
                                    </script>
                                </div>
                                <!-- Facebook Button -->
                                <div class="itemFacebookButton">
                                    <div id="fb-root"></div>
                                    <script>
                                        (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));

                                    </script>
                                    <div class="fb-like" data-width="200" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                </div>
                                <div class="clr"></div>
                            </div>
                            
                            @if(!empty($post->tags))
                                <!-- Tag -->
                                <div class="klw-new-tags clearfix">
                                    <ul class="knt-list">
                                        @foreach($post->tags as $tag)
                                        
                                        <li class="kli"><a href="{{route('fe.post.tag',['slug'=>$tag->slug])}}" title="{{$tag->name}}">{{$tag->name}}</a></li>   
                                        @endforeach     
                                    </ul>
                                </div>
                            @endif
                            <!-- Author Block -->
                            <div class="itemTitileAuthor">
                                <h3 class="titleSingle">{{ $post->author }}</h3>
                            </div>
                            <div class="itemAuthorBlock">
                                <img class="itemAuthorAvatar" src="{{asset('theme/assets/images/user.png')}}" alt="{{ $post->author }}" />
                                <div class="itemAuthorDetails">
                                    <p>
                                        <p>Là một chuyên gia viết bài, chuyên gia marketting </p>
                                    </p>
                                    <div class="clr"></div>
                                </div>
                                <div class="clr"></div>
                            </div>

                            @include('front_end.posts.elements.comments')

                            <div class="clr"></div>
 
                           
                            <!-- Related items by tag -->
                            @if ($relatedPosts->isNotEmpty())
                                @include('front_end.posts.elements.related_post')
                            @endif
                            <div class="itemBackToTop">
                                <a class="k2Anchor" href="#startOfPageId12">Back to top </a>
                            </div>
                            <div class="clr"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
