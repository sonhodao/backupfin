@php

$firstPost = $hots->first();
@endphp
@if($firstPost)
@php
$listPosts = $hots->where("id",'!=',$firstPost->id);
@endphp
<section id="section-id-1530253945952" class="sppb-section ">
    <div class="sppb-row-container">
        <div class="sppb-row">
            <div class="sppb-col-md-6">
                <div id="column-id-1530253945950" class="sppb-column sppb-addon-featured">
                    <div class="sppb-column-addons">
                        <div id="sppb-addon-1530254116859" class="clearfix">
                            <div class="sppb-addon sppb-addon-module ">
                                <div class="sppb-addon-content">
                                    <div class="custom">
                                        <div id="sj_basic_news_163763887145773201" class="sj-basic-news">
                                            <div class="bs-items">

                                                <div class="bs-item cf last">
                                                    <div class="bs-image">
                                                        <a href="{{ route('fe.post', ['slug' => $firstPost->slug, 'id' => $firstPost->id]) }}" title="5 Effective Email Unsubscribe Pages">
                                                            <img src="{{get_image_url($firstPost->thumbnail, 'featured')}}" alt="{{$firstPost->title}}" title="{{$firstPost->title}}" />
                                                        </a>
                                                    </div>

                                                    <div class="bs-content">
                                                        <div class="bs-cat-date">
                                                            <span class="bs-date">
                                                                {{$firstPost->categories->first()->title}} - {{\Carbon\Carbon::parse($firstPost->published_at)->format('d/m/Y')}}</span>
                                                        </div>

                                                        <div class="bs-title">
                                                            <a href="{{route('fe.post',['slug'=>$firstPost->slug,'id'=>$firstPost->id])}}" title="5 Effective Email Unsubscribe Pages">
                                                                {{$firstPost->title}}
                                                            </a>
                                                        </div>

                                                        <div class="bs-description">
                                                            {{$firstPost->excerpt}}
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sppb-col-md-6">
                <div id="column-id-1530253945951" class="sppb-column sppb-addon-news">
                    <div class="sppb-column-addons">
                        <div id="sppb-addon-1530254633974" class="clearfix">
                            <div class="sppb-addon sppb-addon-module ">
                                <div class="sppb-addon-content">

                                    <div id="sj_extraslider_11803805571637638871" class="sj-extraslider  extra-resp01-1 extra-resp02-1 extra-resp03-1 extra-resp04-1 button-type1">
                                        <!--<![endif]-->
                                        <div class="heading-title">Hot News</div>
                                        <!--end heading-title-->
                                        <div class="extraslider-inner" data-effect="none">
                                            @foreach ($listPosts->chunk(6) as $posts)
                                            <div class="item">
                                                @foreach ($posts as $post)
                                                <div class="item-wrap style2">
                                                    <div class="item-wrap-inner">
                                                        <div class="item-info-financial">
                                                            <div class="item-title">
                                                                <i class="fas fa-caret-right"></i>
                                                                <a href="{{route('fe.post',['slug'=>$post->slug,'id' => $post->id])}}" title="">
                                                                    {{$post->title}}
                                                                </a>
                                                            </div>
                                                            <div class="item-content"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            @endforeach
                                        </div>
                                        <!--end extraslider-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function($) {
        ;
        (function(element) {
            var $element = $(element)
                , $extraslider = $(".extraslider-inner", $element)
                , _delay = 300
                , _duration = 600
                , _effect = 'none';

            $extraslider.on("initialized.owl.carousel", function() {
                var $item_active = $(".owl-item.active", $element);
                if ($item_active.length > 1 && _effect != "none") {
                    _getAnimate($item_active);
                } else {
                    var $item = $(".owl-item", $element);
                    $item.css({
                        "opacity": 1
                        , "filter": "alpha(opacity = 100)"
                    });
                }

                $(".owl-controls", $element).insertBefore($extraslider);
                $(".owl-dots", $element).insertAfter($(".owl-prev", $element));

            });

            $extraslider.owlCarousel({
                margin: 5
                , slideBy: 1
                , autoplay: 0
                , autoplayHoverPause: 1
                , autoplayTimeout: 5000
                , autoplaySpeed: 2000
                , startPosition: 0
                , mouseDrag: 1
                , touchDrag: 1
                , autoWidth: false
                , responsive: {
                    0: {
                        items: 1
                    }
                    , 480: {
                        items: 1
                    }
                    , 768: {
                        items: 1
                    }
                    , 992: {
                        items: 1
                    }
                    , 1200: {
                        items: 1
                    }
                }
                , dotClass: "owl-dot"
                , dotsClass: "owl-dots"
                , dots: false
                , dotsSpeed: 500
                , nav: true
                , loop: true
                , navSpeed: 500
                , navText: ["<i class='fa fa-angle-left i-padding-carousel'>", "<i i-padding-carousel class='fa fa-angle-right'>"]
                , navClass: ["owl-prev", "owl-next"]
            });

            $extraslider.on("translate.owl.carousel", function(e) {

                var $item_active = $(".owl-item.active", $element);
                _UngetAnimate($item_active);
                _getAnimate($item_active);
            });

            $extraslider.on("translated.owl.carousel", function(e) {


                var $item_active = $(".owl-item.active", $element);
                var $item = $(".owl-item", $element);

                _UngetAnimate($item);

                if ($item_active.length > 1 && _effect != "none") {
                    _getAnimate($item_active);
                } else {

                    $item.css({
                        "opacity": 1
                        , "filter": "alpha(opacity = 100)"
                    });

                }
            });

            function _getAnimate($el) {
                if (_effect == "none") return;
                $extraslider.removeClass("extra-animate");
                $el.each(function(i) {
                    var $_el = $(this);
                    var i = i + 1;
                    $(this).css({
                        "-webkit-animation": _effect + " " + _duration + "ms ease both"
                        , "-moz-animation": _effect + " " + _duration + "ms ease both"
                        , "-o-animation": _effect + " " + _duration + "ms ease both"
                        , "animation": _effect + " " + _duration + "ms ease both"
                        , "-webkit-animation-delay": +i * _delay + "ms"
                        , "-moz-animation-delay": +i * _delay + "ms"
                        , "-o-animation-delay": +i * _delay + "ms"
                        , "animation-delay": +i * _delay + "ms",

                    }).animate({

                    });

                    if (i == $el.size() - 1) {
                        $extraslider.addClass("extra-animate");
                    }
                });
            }

            function _UngetAnimate($el) {
                $el.each(function(i) {
                    $(this).css({
                        "animation": ""
                        , "-webkit-animation": ""
                        , "-moz-animation": ""
                        , "-o-animation": ""
                    , });
                });
            }

        })("#sj_extraslider_11803805571637638871");
    });

</script>
@endpush
@endif
