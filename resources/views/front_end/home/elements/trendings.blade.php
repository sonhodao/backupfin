@if($trendings)
<section  class="sppb-section ">
    <div class="sppb-row-container">
        <div class="sppb-row">
            <div class="sppb-col-md-12">
                <div  class="sppb-column">
                    <div class="sppb-column-addons">
                        <div class="clearfix">
                            <div class="sppb-addon sppb-addon-module ">
                                <div class="sppb-addon-content">
                                    <div class="moduletable  sppb-addon-trending">
                                        <div id="sj_extra_slider_trendings" class="sj-extra-slider buttom-type1 extra-resp00-1extra-resp01-1 extra-resp02-1 extra-resp03-1 extra-resp04-1  button-type1">
                                            <div class="heading-title">Trending Now
                                            </div>
                                            <div class="extraslider-inner" data-effect="none">
                                               @foreach($trendings->chunk(5) as $groups) 
                                                <div class="item ">
                                                    @foreach($groups as $post) 
                                                    @php 
                                                     $urlImage = get_image_url($post->thumbnail, 'featured');              
                                                     if($loop->index !=0){
                                                        $urlImage = get_image_url($post->thumbnail, 'default');
                                                     }
                                                    @endphp 
                                                    <div class="item-wrap style2  @if($loop->index ==0) col-lg-6 col-sm-4 col-xs-12  first-item @else col-lg-3 col-sm-4 col-xs-12 @endif">
                                                        <div class="item-wrap-inner">
                                                            <div class="item-image">
                                                                <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                                                    <img src="{{ $urlImage }}" alt="{{ $post->title }}" />
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="item-content">
                                                                    <ul>
                                                                        <li class="item-author">
                                                                            {{$post->categories->first()->title}}
                                                                        </li>
                                                                        <li class="item-date">
                                                                            - {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}
                                                                        </li>
                                                                    </ul>
                                                                    <div class="item-comment">
                                                                        <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}#itemCommentsAnchor">{{$post->count_comment}}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="item-title">
                                                                    <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}" title="{{ $post->title }}">
                                                                        {{ $post->title }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach                
                                                </div>
                                               @endforeach
                                            </div>
                                            <!--End extraslider-inner -->
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
</section>


@push("scripts")

<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function ($) {
        ; (function (element) {
            var $element = $(element),
                $extraslider = $(".extraslider-inner", $element),
                _delay = 300,
                _duration = 600,
                _effect = 'none';

            $extraslider.on("initialized.owl.carousel", function () {
                var $item_active = $(".owl-item.active", $element);
                if ($item_active.length > 1 && _effect != "none") {
                    _getAnimate($item_active);
                }
                else {
                    var $item = $(".owl-item", $element);
                    $item.css({ "opacity": 1, "filter": "alpha(opacity = 100)" });
                }

                $(".owl-controls", $element).insertBefore($extraslider);
                $(".owl-dots", $element).insertAfter($(".owl-prev", $element));

            });

            $extraslider.owlCarousel({

                margin: 5,
                slideBy: 1,
                autoplay: 0,
                autoplayHoverPause: 1,
                autoplayTimeout: 5000,
                autoplaySpeed: 2000,
                startPosition: 0,
                mouseDrag: 1,
                touchDrag: 1,
                autoWidth: false,
                responsive: {
                    0: { items: 1 },
                    480: { items: 1 },
                    768: { items: 1 },
                    992: { items: 1 },
                    1200: { items: 1 }
                },
                dotClass: "owl-dot",
                dotsClass: "owl-dots",
                dots: false,
                dotsSpeed: 500,
                nav: true,
                loop: true,
                navSpeed: 500,
                navText: ["<i class='fa fa-angle-left i-padding-carousel'>", "<i class='i-padding-carousel fa fa-angle-right'>"],
                navClass: ["owl-prev", "owl-next"]

            });

            $extraslider.on("translate.owl.carousel", function (e) {

                var $item_active = $(".owl-item.active", $element);
                _UngetAnimate($item_active);
                _getAnimate($item_active);
            });

            $extraslider.on("translated.owl.carousel", function (e) {


                var $item_active = $(".owl-item.active", $element);
                var $item = $(".owl-item", $element);

                _UngetAnimate($item);

                if ($item_active.length > 1 && _effect != "none") {
                    _getAnimate($item_active);
                } else {

                    $item.css({ "opacity": 1, "filter": "alpha(opacity = 100)" });

                }
            });

            function _getAnimate($el) {
                if (_effect == "none") return;
                $extraslider.removeClass("extra-animate");
                $el.each(function (i) {
                    var $_el = $(this);
                    $(this).css({
                        "-webkit-animation": _effect + " " + _duration + "ms ease both",
                        "-moz-animation": _effect + " " + _duration + "ms ease both",
                        "-o-animation": _effect + " " + _duration + "ms ease both",
                        "animation": _effect + " " + _duration + "ms ease both",
                        "-webkit-animation-delay": +i * _delay + "ms",
                        "-moz-animation-delay": +i * _delay + "ms",
                        "-o-animation-delay": +i * _delay + "ms",
                        "animation-delay": +i * _delay + "ms",
                        "opacity": 1
                    }).animate({
                        opacity: 1
                    });

                    if (i == $el.size() - 1) {
                        $extraslider.addClass("extra-animate");
                    }
                });
            }

            function _UngetAnimate($el) {
                $el.each(function (i) {
                    $(this).css({
                        "animation": "",
                        "-webkit-animation": "",
                        "-moz-animation": "",
                        "-o-animation": "",
                        "opacity": 1
                    });
                });
            }

        })("#sj_extra_slider_trendings");
    });
//]]>
</script>

@endpush

@endif