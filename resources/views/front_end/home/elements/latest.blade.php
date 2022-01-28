<section id="section-id-1530259938928" class="sppb-section ">
    <div class="sppb-row-container">
        <div class="sppb-row">
            <div class="sppb-col-md-12">
                <div id="column-id-1530259938927" class="sppb-column">
                    <div class="sppb-column-addons">
                        <div id="sppb-addon-1530260494407" class="clearfix">
                            <div
                                class="sppb-addon sppb-addon-module sppb-addons-latestarticles">
                                <div class="sppb-addon-content">
                                    <div class="moduletable ">
                                        <div id="sj_extra_slider_17274059491637638871"
                                            class="sj-extra-slider buttom-type1 extra-resp00-3extra-resp01-3 extra-resp02-3 extra-resp03-2 extra-resp04-1  button-type1">
                                            <!--<![endif]-->
                                            <!-- Begin extraslider-inner -->
                                            <div class="heading-title">Latest
                                                Articles</div>
                                            <div class="extraslider-inner"
                                                data-effect="none">

                                                @foreach ($lastests as $lastest)
                                                <div class="item ">
                                                    <div class="item-wrap style2">
                                                        <div
                                                            class="item-wrap-inner">
                                                            <div class="item-image">
                                                                <a href="{{route('fe.post',['slug'=>$lastest->slug,'id'=>$lastest->id])}}"
                                                                    title="We don’t see them, we will never see them. Special cloth alert."><img
                                                                        src="{{get_image_url($lastest->thumbnail, 'featured')}}"
                                                                        alt="{{get_image_url($lastest->thumbnail, 'featured')}}" />
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div
                                                                    class="item-title">
                                                                    <a href="{{route('fe.post',['slug'=>$lastest->slug,'id'=>$lastest->id])}}"
                                                                        title="{{$lastest->title}}">
                                                                        {{$lastest->title}}
                                                                    </a>
                                                                </div>
                                                                <div
                                                                    class="item-content">
                                                                    <ul>
                                                                        <li
                                                                            class="item-author">
                                                                            {{$lastest->categories->first()->title}}
                                                                            <span></span>
                                                                        </li>
                                                                        <li
                                                                            class="item-date">
                                                                            - {{\Carbon\Carbon::parse($lastest->published_at)->format('d/m/Y')}}
                                                                        </li>
                                                                    </ul>
                                                                    <div class="item-comment">
                                                                        <a
                                                                            href="{{route('fe.post',['slug'=>$lastest->slug,'id'=>$lastest->id])}}">
                                                                            0 </a>
                                                                    </div>
                                                                    <div
                                                                        class="item-description">
                                                                        {{$lastest->excerpt}}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End item-wrap -->
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
                    480: { items: 2 },
                    768: { items: 3 },
                    992: { items: 3 },
                    1200: { items: 3 }
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
                //if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
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

        })("#sj_extra_slider_17274059491637638871");
    });
//]]>
</script>

@endpush
