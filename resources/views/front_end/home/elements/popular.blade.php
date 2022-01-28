<section id="section-id--home-popular" class="sppb-section ">
    <div class="sppb-row-container">
        <div class="sppb-row">
            <div class="sppb-col-md-8">
                <div  class="sppb-column">
                    <div class="sppb-column-addons">
                        <div id="sppb-addon-1530258335749" class="clearfix">
                            <div class="sppb-addon sppb-addon-module ">
                                <div class="sppb-addon-content">
                                    <div id="sj_listing_tabs_popular" class="sj-listing-tabs first-load">
                                        <div class="pre-text">
                                            <h3 class="sppb-addon-title">Popular Articles</h3>
                                        </div>
                                        <div class="ltabs-wrap ">
                                            <!--Begin Tabs-->
                                            <div class="ltabs-tabs-container"
                                                data-delay="300"
                                                data-duration="600"
                                                data-effect="fadeIn"
                                                data-ajaxurl="{{ route('fe.post.getPopular') }}"
                                                >
                                                <div class="ltabs-tabs-wrap ld-tab">
                                                    <span class='ltabs-tab-selected'></span>
                                                    <span class='ltabs-tab-arrow'>&#9660;</span>
                                                    <ul class="ltabs-tabs cf">
                                                        <li class="ltabs-tab tab-sel tab-loaded  tab-all"
                                                            data-category-id="*"
                                                            data-active-content=".items-category-all"
                                                            >
                                                            <span class="ltabs-tab-label">Tất cả</span>
                                                        </li>
                                                        @foreach ($categoriesPopular as $category)
                                                        <li class="ltabs-tab"
                                                            data-category-id="{{ $category->id }}"
                                                            data-active-content=".items-category-{{ $category->id }}"
                                                            >
                                                            <span class="ltabs-tab-label">{{ $category->title }}</span>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Tabs-->

                                            <div class="ltabs-items-container">
                                                <!--Begin Items-->
                                                <div class="ltabs-items ltabs-items-selected ltabs-items-loaded items-category-all">
                                                    <div class="ltabs-items-inner ltabs00-1 ltabs01-1 ltabs02-1 ltabs03-1 ltabs04-1 fadeIn">
                                                        @foreach($populars as $post)
                                                            <div class="ltabs-item new-ltabs-item">
                                                                <div class="item-inner">
                                                                    <div class="item-image">
                                                                        <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}"
                                                                            title="{{ $post->title }}">
                                                                            <img
                                                                                src="{{ get_image_url($post->thumbnail, 'default')}}"
                                                                                alt="{{ $post->title }}" />
                                                                        </a>
                                                                    </div>

                                                                    <div class="item-content">
                                                                        <div class="item-info">
                                                                            <ul>
                                                                                <li class="item-author">{{$post->categories->first()->title}}</li>
                                                                                <li class="item-date">
                                                                                    - {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}
                                                                                </li>
                                                                            </ul>
                                                                            <div class="item-comment">
                                                                                <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}#itemCommentsAnchor">
                                                                                    {{$post->count_comment}}
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-title">
                                                                            <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}"
                                                                                title="{{ $post->title }}">
                                                                                {{ $post->title }}
                                                                            </a>
                                                                        </div>
                                                                        <div class="item-description">
                                                                            {{ $post->excerpt }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="ltabs-loadmore"
                                                        data-active-content=".items-category-all"
                                                        data-categoryid="0"
                                                        data-rl_start="5"
                                                        data-rl_total="18"
                                                        data-rl_allready="All ready"
                                                        data-ajaxurl="{{ route('fe.post.getPopular') }}"
                                                        data-rl_load="5">
                                                        <div class="ltabs-loadmore-btn " data-label="Load more">
                                                            <span class="ltabs-image-loading"></span>
                                                            <img class="add-loadmore" alt="Load More" src="{{ asset('theme/assets/images/add.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($categoriesPopular as $category)
                                                <div class="ltabs-items  items-category-{{ $category->id }}">
                                                    <div class="ltabs-items-inner ltabs00-1 ltabs01-1 ltabs02-1 ltabs03-1 ltabs04-1 fadeIn">
                                                        <div class="ltabs-loading"></div>
                                                    </div>
                                                    <div class="ltabs-loadmore"
                                                        data-active-content=".items-category-{{ $category->id }}"
                                                        data-categoryid="{{ $category->id }}"
                                                        data-rl_start="5"
                                                        data-rl_total="15"
                                                        data-rl_allready="All ready"
                                                        data-ajaxurl="{{ route('fe.post.getPopular') }}"
                                                        data-rl_load="5">
                                                        <div class="ltabs-loadmore-btn" data-label="Load more">
                                                            <span class="ltabs-image-loading"></span>
                                                            <img class="add-loadmore" alt="Load More" src="{{ asset('theme/assets/images/add.png') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                            <!--End Items-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include("front_end.home.elements.popular-right")
        </div>
    </div>
</section>


@push("scripts")

<script type="text/javascript">
    //<![CDATA[
    jQuery(document).ready(function ($) {
        ;
        (function (element) {

            var $element = $(element),
                $tab = $('.ltabs-tab', $element),
                $tab_label = $('.ltabs-tab-label', $tab),
                $tabs = $('.ltabs-tabs', $element),
                ajax_url = $tabs.parents('.ltabs-tabs-container').attr('data-ajaxurl'),
                effect = $tabs.parents('.ltabs-tabs-container').attr('data-effect'),
                delay = $tabs.parents('.ltabs-tabs-container').attr('data-delay'),
                duration = $tabs.parents('.ltabs-tabs-container').attr('data-duration'),
                $items_content = $('.ltabs-items', $element),
                $items_inner = $('.ltabs-items-inner', $items_content),
                $items_first_active = $('.ltabs-items-selected', $element),
                $load_more = $('.ltabs-loadmore', $element),
                $btn_loadmore = $('.ltabs-loadmore-btn', $load_more),
                $select_box = $('.ltabs-selectbox', $element),
                $tab_label_select = $('.ltabs-tab-selected', $element);

            enableSelectBoxes();
            function enableSelectBoxes() {
                $tab_wrap = $('.ltabs-tabs-wrap', $element),
                    $tab_label_select.html($('.ltabs-tab', $element).filter('.tab-sel').children('.ltabs-tab-label').html());
                if ($(window).innerWidth() <= 479) {
                    $tab_wrap.addClass('ltabs-selectbox');
                } else {
                    $tab_wrap.removeClass('ltabs-selectbox');
                }
            }

            $('span.ltabs-tab-selected, span.ltabs-tab-arrow', $element).click(function () {
                if ($('.ltabs-tabs', $element).hasClass('ltabs-open')) {
                    $('.ltabs-tabs', $element).removeClass('ltabs-open');
                } else {
                    $('.ltabs-tabs', $element).addClass('ltabs-open');
                }
            });

            $(window).resize(function () {
                if ($(window).innerWidth() <= 479) {
                    $('.ltabs-tabs-wrap', $element).addClass('ltabs-selectbox');
                } else {
                    $('.ltabs-tabs-wrap', $element).removeClass('ltabs-selectbox');
                }
            });

            function showAnimateItems(el) {
                var $_items = $('.new-ltabs-item', el), nub = 0;
                $('.ltabs-loadmore-btn', el).fadeOut('fast');
                $_items.each(function (i) {
                    nub++;
                    switch (effect) {
                        case 'none':
                            $(this).css({ 'opacity': '1', 'filter': 'alpha(opacity = 100)' });
                            break;
                        default:
                            animatesItems($(this), nub * delay, i, el);
                    }
                    if (i == $_items.length - 1) {
                        $('.ltabs-loadmore-btn', el).fadeIn(delay);
                    }
                    $(this).removeClass('new-ltabs-item');
                });
            }

            function animatesItems($this, fdelay, i, el) {
                var $_items = $('.ltabs-item', el);
                $this.attr("style",
                    "-webkit-animation:" + effect + " " + duration + "ms;"
                    + "-moz-animation:" + effect + " " + duration + "ms;"
                    + "-o-animation:" + effect + " " + duration + "ms;"
                    + "-moz-animation-delay:" + fdelay + "ms;"
                    + "-webkit-animation-delay:" + fdelay + "ms;"
                    + "-o-animation-delay:" + fdelay + "ms;"
                    + "animation-delay:" + fdelay + "ms;").delay(fdelay).animate({
                        opacity: 1,
                        filter: 'alpha(opacity = 100)'
                    }, {
                        delay: 100
                    });
                if (i == ($_items.length - 1)) {
                    $(".ltabs-items-inner").addClass("play");
                }
            }

            showAnimateItems($items_first_active);
            $tab.on('click.tab', function () {
                var $this = $(this);
                if ($this.hasClass('tab-sel')) return false;
                if ($this.parents('.ltabs-tabs').hasClass('ltabs-open')) {
                    $this.parents('.ltabs-tabs').removeClass('ltabs-open');
                }
                $tab.removeClass('tab-sel');
                $this.addClass('tab-sel');
                var items_active = $this.attr('data-active-content');
                var _items_active = $(items_active, $element);

                $items_content.removeClass('ltabs-items-selected');
                _items_active.addClass('ltabs-items-selected');
                $tab_label_select.html($tab.filter('.tab-sel').children('.ltabs-tab-label').html());
                var $loading = $('.ltabs-loading', _items_active);
                var loaded = _items_active.hasClass('ltabs-items-loaded');
                if (!loaded && !_items_active.hasClass('ltabs-process')) {
                    _items_active.addClass('ltabs-process');
                    var category_id = $this.attr('data-category-id');
                    $('#sj_listing_tabs_popular .ltabs-item').css('opacity', '0');
                    $('#sj_listing_tabs_popular .ltabs-item').css('display', 'none');

                    $loading.show();
                    $.ajax({
                        type: 'POST',
                        url: ajax_url,
                        data: {
                            categoryId: category_id,
                            limitstart: $this.parent().attr('data-rl_start')
                        },
                        success: function (data) {
                            if (data.items_markup != '') {
                                $('.ltabs-items-inner', _items_active).html(data.items_markup);
                                _items_active.addClass('ltabs-items-loaded').removeClass('ltabs-process');
                                $loading.remove();
                                showAnimateItems(_items_active);
                                updateStatus(_items_active);
                            }
                        },
                        error: function (xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            console.log(err.Message);
                        },
                        dataType: 'json'
                    });

                } else {
                    $('.ltabs-item', $items_content).removeAttr('style').addClass('new-ltabs-item').css('opacity', 0);
                    showAnimateItems(_items_active);

                }
            });

            function updateStatus($el) {
                $('.ltabs-loadmore-btn', $el).removeClass('loading');
                var countitem = $('.ltabs-item', $el).length;
                $('.ltabs-image-loading', $el).css({ display: 'none' });
                $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_start', countitem);
                var rl_total = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_total');
                var rl_load = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_load');
                var rl_allready = $('.ltabs-loadmore-btn', $el).parent().attr('data-rl_allready');

                if (countitem >= rl_total) {
                    $('.ltabs-loadmore-btn', $el).addClass('loaded');
                    $('.ltabs-image-loading', $el).css({ display: 'none' });
                    $('.ltabs-loadmore-btn', $el).attr('data-label', rl_allready);
                    $('.ltabs-loadmore-btn', $el).removeClass('loading');
                }
            }

            $btn_loadmore.on('click.loadmore', function () {
                var $this = $(this);
                if ($this.hasClass('loaded') || $this.hasClass('loading')) {
                    return false;
                } else {
                    $this.addClass('loading');
                    $('.ltabs-image-loading', $this).css({ display: 'inline-block' });
                    var rl_start = $this.parent().attr('data-rl_start'),
                        rl_ajaxurl = $this.parent().attr('data-ajaxurl'),
                        effect = $this.parent().attr('data-effect'),
                        category_id = $this.parent().attr('data-categoryid'),
                        items_active = $this.parent().attr('data-active-content');
                    var _items_active = $(items_active, $element);
                    var start = $this.parent().attr('data-rl_start');
                    $.ajax({
                        type: 'POST',
                        url: rl_ajaxurl,
                        data: {
                            categoryId: category_id,
                            limitstart: $this.parent().attr('data-rl_start')
                        },
                        success: function (data) {
                            if (data.items_markup != '') {
                                $(data.items_markup).insertAfter($('.ltabs-item', _items_active).nextAll().last());
                                $('.ltabs-image-loading', $this).css({ display: 'none' });
                                showAnimateItems(_items_active);
                                updateStatus(_items_active);
                            }
                        }, dataType: 'json'
                    });
                }
                return false;
            });
            $('#sj_listing_tabs_popular .responsive-content-loadmore').css('display', 'none');

            $('.ltabs-loading').css('display', 'none');
        })('#sj_listing_tabs_popular');


    });
//-->
</script>

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

        })("#sj_extra_slider_2801456301637638871");
    });
//]]>
</script>

@endpush
