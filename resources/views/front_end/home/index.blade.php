@extends('front_end.layouts.app')
@if (!empty($mainSettings['seo_schema']))
    @section('seo_schema')
        {!! $mainSettings['seo_schema'] !!}
    @endsection
@endif
@section('content')
    <section id="sp-main-body">
        <div>
            <div class="front-page-gradient">
                <div>
                    <div>
                        <div class="xtMZjA _126M0v _2OCd5u _3Xp0F1 _1AHzuc _2rWjjQ _28lKVZ _2mKlII">
                            <section class="GAnxpo">
                                <div class="_2WVZaP">
                                    <h1 class="RsbQUL _3Iclis _2tUimO _2GMChG _364Ovs" data-currency="Title">
                                        {{ $mainTexts['title_home'] }}</h1>
                                    <div class="_3g0ely">
                                        <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                            {{ $mainTexts['text_1'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="_3ORGKi">
                                    <div class="_1RSWtI">
                                        <span class="_2TEgi3 BzT_fR _2GMChG _1VhA5C" data-currency="Text">
                                            {{ $mainTexts['text_2'] }}
                                        </span>
                                    </div>
                                    <div class="_1lkfVs">
                                        @foreach ($menuItems as $menuItem)
                                            <a class="_2GMChG _38uDl8 eIBHSv _23_Bjp _2zmeFA" href="{{ $menuItem->link }}"
                                                data-currency="Link">
                                                <div class="g7SsiF">
                                                    <div @if (!empty($menuItem->color)) style="background-color:{{ $menuItem->color }}" @else style="background-color:#E3F9F1" @endif class="ckYtWK div-thumbnail-text">
                                                        @if (!empty($menuItem->thumbnail))
                                                            <img src="{{ $menuItem->thumbnail }}"
                                                                alt="{{ $menuItem->label }}" class="thumbnail-text-home">
                                                        @else
                                                            <svg viewBox="0 0 56 56" aria-hidden="true"
                                                                class="_2AKVi7" fill="#55B78A" focusable="false"
                                                                width="48" height="48">
                                                                <path
                                                                    d="M43.2 24.356H30a14.308 14.308 0 01.491-1.815 6.229 6.229 0 012.216-.448c3.032-.3 7.613-.748 7.886-9.089a18.032 18.032 0 01.237-2.418.751.751 0 00-.627-.854c-.233-.035-5.749-.846-9.06 2.534-2.1 2.139-2.784 5.423-2.062 9.752a15.547 15.547 0 00-.611 2.341h-.216a21.517 21.517 0 00-2.015-6.04.683.683 0 00.04-.118c.745-5.149-.157-8.991-2.684-11.417-3.93-3.776-10.263-2.648-10.531-2.6a.75.75 0 00-.6.873 20.987 20.987 0 01.363 2.82c.608 9.593 5.893 9.951 9.39 10.188a9.247 9.247 0 012.382.356 21.872 21.872 0 012.131 5.936H12.8A1.65 1.65 0 0011.148 26v5.118a1.649 1.649 0 001.652 1.646h.469l2.909 17.316a2.3 2.3 0 002.28 1.928h.013l18.567-.078a2.319 2.319 0 002.262-1.868l3.341-17.3h.559a1.649 1.649 0 001.648-1.645V26a1.65 1.65 0 00-1.648-1.644zM32.211 13.318c1.83-1.872 4.615-2.192 6.306-2.192.271 0 .514.008.72.02a18.024 18.024 0 00-.141 1.806c-.23 7.026-3.579 7.355-6.534 7.645-.475.047-.927.1-1.361.179.265-.558.488-.951.578-1.1a12.377 12.377 0 012.355-3.037.75.75 0 00-1.055-1.066 13.886 13.886 0 00-2.586 3.327c-.047.079-.108.184-.179.311a7.871 7.871 0 011.897-5.893zm-7.223 2.69a35.158 35.158 0 00-4.824-6.247.75.75 0 00-1.082 1.039 33.458 33.458 0 014.54 5.876 30.36 30.36 0 00-1.3-.108c-3.5-.237-7.47-.506-7.994-8.786a20.74 20.74 0 00-.248-2.218c1.677-.159 5.834-.249 8.485 2.3 1.835 1.769 2.635 4.509 2.423 8.144zm18.364 15.111a.147.147 0 01-.148.145h-8.717a.75.75 0 000 1.5h6.623l-3.286 17.011a.813.813 0 01-.793.655l-18.567.078a.826.826 0 01-.807-.676l-2.871-17.068H27.5l.01 1.83a3.527 3.527 0 00-3.176 3.266 3.058 3.058 0 001.226 2.389 4.21 4.21 0 001.982.845l.017 3.594a2.633 2.633 0 01-1.038-.487 1.592 1.592 0 01-.66-1.224.716.716 0 00-.754-.746.75.75 0 00-.746.754 3.057 3.057 0 001.227 2.39 4.208 4.208 0 001.978.844l.007 1.3a.749.749 0 00.75.746.75.75 0 00.747-.753l-.007-1.3a3.525 3.525 0 003.169-3.266 3.057 3.057 0 00-1.226-2.389 4.266 4.266 0 00-1.974-.839l-.018-3.6a2.653 2.653 0 011.031.488 1.589 1.589 0 01.66 1.223.734.734 0 00.754.746.75.75 0 00.746-.754 3.058 3.058 0 00-1.226-2.389 4.253 4.253 0 00-1.972-.835L29 32.039a.763.763 0 00-.551-.715.734.734 0 00-.293-.06H12.8a.147.147 0 01-.148-.145V26a.148.148 0 01.148-.145h30.4a.148.148 0 01.148.145zM27.517 36.13l.017 3.422a2.605 2.605 0 01-1.04-.477 1.592 1.592 0 01-.66-1.223 1.99 1.99 0 011.683-1.722zm1.525 5.112a2.647 2.647 0 011.034.485 1.587 1.587 0 01.659 1.223 1.957 1.957 0 01-1.676 1.725z">
                                                                </path>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                    <div class="_3qssXk" style="overflow: hidden;">
                                                        <span class="_2TEgi3 _2GMChG" data-currency="Text">
                                                            @if (!empty($menuItem->text))
                                                                {{ $menuItem->text }}
                                                            @else
                                                                {{ $menuItem->label }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div>
                <div class="_3IvYFZ M-VCGQ _3hnXrF">
                    {{-- MOBILE CAROSEL ICON --}}
                    <div class="three-tiles__carousel carousel__container O-xWzG ">
                        <div class="slick-slider slick-initialized" dir="ltr">
                            <div class="slick-list" style="padding:0px 20">
                                <div class="slick-track owl-carousel owl2 owl-theme" style="width:100%;left:0%">
                                    @if ($mainTexts['isHome_k1'] == 1)
                                    <div data-index="0" class="item slick-slide slick-active slick-center slick-current tabindex="-1" aria-hidden="false">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k1'] }};color:white"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div
                                                        class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p
                                                            class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k1'] }}</p>
                                                        <p class="_3QPViY _1b9uhc BzT_fR _2GMChG">
                                                            {{ $mainTexts['title_k1'] }}</p>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX"
                                                                data-currency="Button"
                                                                href="{{ $mainTexts['link_k1'] }}">
                                                                <div class="_3kMetw"><span
                                                                        class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">{{ $mainTexts['text_but_k1'] }}</span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($mainTexts['isHome_k2'] == 1)
                                    <div data-index="1" class="item slick-slide  @if ($mainTexts['isHome_k2'] == 0) d-none @endif" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k2'] }};color:neutral-darkest"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k2'] }}
                                                        </p>
                                                        <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                                            {{ $mainTexts['title_k2'] }}
                                                        </span>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                                                href="{{ $mainTexts['link_k2'] }}">
                                                                <div class="_3kMetw">
                                                                    <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                                        {{ $mainTexts['text_but_k2'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($mainTexts['isHome_k3'] == 1)
                                    <div data-index="2" class="item slick-slide  @if ($mainTexts['isHome_k3'] == 0) d-none @endif" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k3'] }};color:white"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k3'] }}
                                                        </p>
                                                        <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                                            {{ $mainTexts['title_k3'] }}
                                                        </span>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                                                href="{{ $mainTexts['link_k3'] }}">
                                                                <div class="_3kMetw">
                                                                    <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                                        {{ $mainTexts['text_but_k3'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($mainTexts['isHome_k4'] == 1)
                                    <div data-index="3" class="item slick-slide" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k4'] }}"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div
                                                        class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p
                                                            class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k4'] }}
                                                        </p>
                                                        <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                                            {{ $mainTexts['title_k4'] }}
                                                        </span>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX"
                                                                data-currency="Button"
                                                                href="{{ $mainTexts['link_k4'] }}">
                                                                <div class="_3kMetw">
                                                                    <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                                        {{ $mainTexts['text_but_k4'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($mainTexts['isHome_k5'] == 1)
                                    <div data-index="4" class="item slick-slide" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k5'] }};color:neutral-darkest"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div
                                                        class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p
                                                            class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k5'] }}
                                                        </p>
                                                            <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                                                {{ $mainTexts['title_k5'] }}
                                                            </span>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX"
                                                                data-currency="Button"
                                                                href="{{ $mainTexts['link_k5'] }}">
                                                                <div class="_3kMetw"><span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                                    {{ $mainTexts['text_but_k5'] }}
                                                                </span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($mainTexts['isHome_k6'] == 1)
                                    <div data-index="5" class="item slick-slide" tabindex="-1" aria-hidden="true">
                                        <div>
                                            <div tabindex="-1" style="width:100%;display:inline-block">
                                                <div style="background-color:{{ $mainTexts['color_k6'] }};color:white"
                                                    class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                                                    <div
                                                        class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                                        <p class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                                            {{ $mainTexts['text_k6'] }}
                                                        </p>
                                                        <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                                            {{ $mainTexts['title_k6'] }}
                                                        </span>
                                                        <div>
                                                            <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                                                href="{{ $mainTexts['link_k6'] }}">
                                                                <div class="_3kMetw">
                                                                    <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                                        {{ $mainTexts['text_but_k6'] }}
                                                                    </span>
                                                                </div>
                                                                <div class="u-T1Im"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END --}}
                    <div class="xtMZjA _126M0v _2OCd5u _3Xp0F1 _1AHzuc _2rWjjQ _28lKVZ smorga__container _3jzVCs">
                        @if ($mainTexts['isHome_k1'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k1'] }};color:white" class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k1'] }}
                                </p>
                                <p class="_3QPViY _1b9uhc BzT_fR _2GMChG">{{ $mainTexts['title_k1'] }}</p>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k1'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k1'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($mainTexts['isHome_k2'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k2'] }};color:neutral-darkest"
                            class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k2'] }}
                                </p>
                                <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                    {{ $mainTexts['title_k2'] }}
                                </span>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k2'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k2'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($mainTexts['isHome_k3'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k3'] }};color:white" class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k3'] }}
                                </p>
                                <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                    {{ $mainTexts['title_k3'] }}
                                </span>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k3'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k3'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($mainTexts['isHome_k4'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k4'] }}" class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k4'] }}
                                </p>
                                <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                    {{ $mainTexts['title_k4'] }}
                                </span>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k4'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k4'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($mainTexts['isHome_k5'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k5'] }};color:neutral-darkest"
                            class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k5'] }}
                                </p>
                                <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                    {{ $mainTexts['title_k5'] }}
                                </span>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k5'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k5'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($mainTexts['isHome_k6'] == 1)
                        <div style="background-color:{{ $mainTexts['color_k6'] }};color:white" class="smorga__tile _25DoRA _1P81w3 _1xCoVJ">
                            <div class="smorga__content _3hnXrF _1jo7DN _2Z9_7N _1mFlrI _2KuRfr _1fIWAO">
                                <p class="_3QPViY _2EktBS _2tZLCS _1LAw2a _2GMChG smorga__eyebrow _1aefop">
                                    {{ $mainTexts['text_k6'] }}
                                </p>
                                <span class="_1b9uhc BzT_fR _2tUimO _2GMChG _1VhA5C" data-currency="Text">
                                    {{ $mainTexts['title_k6'] }}
                                </span>
                                <div>
                                    <a class="smorga__btn _3FOdP8 _2nYXVh _2qQLV7 rlmloX" data-currency="Button"
                                        href="{{ $mainTexts['link_k6'] }}">
                                        <div class="_3kMetw">
                                            <span class="_1b9uhc _2tZLCS _1LAw2a _2GMChG _2evdeZ">
                                                {{ $mainTexts['text_but_k6'] }}
                                            </span>
                                        </div>
                                        <div class="u-T1Im"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Khoi 7 --}}
        <div>
            <div class="xtMZjA _126M0v _2OCd5u _3Xp0F1 _1AHzuc _2rWjjQ _28lKVZ reasons">
                <div class="reasons__content">
                    <div class="reasons__copy">
                        <p class="ZhTTb6 _2EktBS _2tZLCS _1LAw2a _2GMChG">{{ $mainTexts['text_k7'] }}</p>
                        <h2 class="RsbQUL OJy1wY _2tUimO _2GMChG reasons__heading" data-currency="Title">
                            {{ $mainTexts['title_k7_1'] }}</h2>
                        <div class="reasons__bullets">
                            <div class="reasons__bullet">
                                <div class="reasons__bulletTitle"><span class="_2TEgi3 BzT_fR _2GMChG _1VhA5C"
                                        data-currency="Text">{{ $mainTexts['title_k7_2'] }}</span></div><span
                                    class="_1b9uhc _25K9cf _2tUimO _2GMChG _34qbNm"
                                    data-currency="Text">{{ $mainTexts['text_k7_21'] }}</span>
                            </div>
                            <div class="reasons__bullet">
                                <div class="reasons__bulletTitle"><span class="_2TEgi3 BzT_fR _2GMChG _1VhA5C"
                                        data-currency="Text">{{ $mainTexts['title_k7_3'] }}</span></div><span
                                    class="_1b9uhc _25K9cf _2tUimO _2GMChG _34qbNm"
                                    data-currency="Text">{{ $mainTexts['text_k7_31'] }}</span>
                            </div>
                            <div class="reasons__bullet">
                                <div class="reasons__bulletTitle"><span class="_2TEgi3 BzT_fR _2GMChG _1VhA5C"
                                        data-currency="Text">{{ $mainTexts['title_k7_4'] }}</span></div><span
                                    class="_1b9uhc _25K9cf _2tUimO _2GMChG _34qbNm"
                                    data-currency="Text">{{ $mainTexts['text_k7_41'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="reasons__image">
                        <figure class="uw0rbR">
                            <div class="_1HYyMh" style="background-color:transparent">
                                <div class="_2iCcdi _3SZFMe">
                                    <div class="_279G9x" style="padding-top:111.44278606965175%;margin-left:-1px">
                                    </div>
                                    <div class="_11xIO9 _3dnDmK">
                                        <img alt="" class="_1v82kl" @if (!empty($mainTexts['image']))
                                        src="{{ $mainTexts['image'] }}"
                                        @else src="{{ asset('theme/assets/images/nw-hp-rtb-destkop-1.jpg') }}"
                                        @endif >
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var owl = $('.owl2 ');
            owl.owlCarousel({
                dots: true,
                items: 1,
                loop: true,
                margin: 10,
                autoHeight: false,
            });
        });
    </script>
@endpush
