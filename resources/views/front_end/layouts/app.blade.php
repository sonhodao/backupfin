<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    {!! meta()->toHtml() !!}
    @stack('robot')
    @yield('breadcrumbs')
    @yield('seo_schema')
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <link rel="preconnect" href="https://connect.facebook.net" />
    <link rel="preconnect" href="https://www.facebook.com" />
    <link rel="preconnect" href="https://www.google-analytics.com"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <link rel="dns-prefetch" href="https://fonts.googleapis.com/" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/" />

    <!-- preload-->

    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmSU5fCxc4EsA.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmSU5fBBc4.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu7WxKOzY.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu7GxKOzY.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu4mxK.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOkCnqEu92Fr1MmgVxHIzIFKw.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmEU9fBBc4.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmEU9fCxc4EsA.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmWUlfBBc4.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2" as="font" crossorigin="anonymous" />
    <link rel="preload" href="{{ asset('theme/plugins/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" crossorigin="anonymous" />
    <link rel="preload" href="{{ asset('theme/plugins/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" crossorigin="anonymous" />

    <link href="{{ asset('theme/assets/css/simple-line-icons.min.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/k2.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/animate.min.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/sppagebuilder.css') }}" rel="preload" as="style"/>
    <link href="{{ asset('theme/assets/css/sppagecontainer.css') }}" rel="preload" tas="stylesheet" />
    <link href="{{ asset('theme/assets/css/sj-basic-news.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/styles.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/css3.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/animate.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/owl.carousel.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/style-extra.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/css3-extra.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/animate-extra.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/sj-listing-tabs.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/fonts/font.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/legacy.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/template.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/presets/preset1.css') }}" rel="preload" as="style"" class="preset" />
    <link href="{{ asset('theme/assets/css/pagebuilder.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/frontend-edit.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/styles-system.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/module_default.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/chosen.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/finder.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/template-languages.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/shortcodes.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/modal.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}" rel="preload" as="style" />
    <link href="{{ asset('theme/assets/css/sj-instagram-gallery.css') }}" rel="preload" as="style"" />
    <link href="{{ asset('theme/plugins/select2/css/select2.min.css') }}" rel="preload" as="style">
    <link href="{{ asset('theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="preload" as="style">
    <link href="{{ asset('theme/assets/css/magnific-popup/magnific-popup.min.css') }}" rel="preload" as="style" >

    @if (!empty($isFrontEndHome))
        <link href="{{ asset('theme/assets/css/home/nds.bd3e445e27138c16e748.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/nav.bd3e445e27138c16e748.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/app.cef1172d508e94d253fd.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/core_comp_dd0759f6.901f015e68a3f7ed3c4a.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/a_be05f1f7.3e7c637972682ba4faab.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/core_comp_0494d315.9a288632807d73baebc5.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/assets/css/home/front-page.3d2ccd4c7df2f1996669.css') }}" rel="preload" as="style">
        <link href="{{ asset('theme/plugins/owl-carousel/css/owl.carousel.min.css') }}" rel="preload" as="style"  />
        <link href="{{ asset('theme/plugins/owl-carousel/css/owl.theme.default.min.css') }}" rel="preload" as="style" />
    @endif
    <link href="{{ asset('theme/assets/css/custom.css') }}" rel="preload" as="style" />
     <!-- end preload-->

    <link href="{{ asset('theme/assets/css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/k2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sppagebuilder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sppagecontainer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-basic-news.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/css3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/css3-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/animate-extra.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-listing-tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/fonts/font.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/legacy.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/template.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/presets/preset1.css') }}" rel="stylesheet" type="text/css" class="preset" />
    <link href="{{ asset('theme/assets/css/pagebuilder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/frontend-edit.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/styles-system.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/module_default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/chosen.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/finder.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/template-languages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/shortcodes.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/sj-instagram-gallery.css') }}" rel="stylesheet" type="text/css"  />
    <link href="{{ asset('theme/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/assets/css/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" >
    @if (!empty($isFrontEndHome))
        <link href="{{ asset('theme/assets/css/home/nds.bd3e445e27138c16e748.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/assets/css/home/nav.bd3e445e27138c16e748.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/assets/css/home/app.cef1172d508e94d253fd.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/assets/css/home/core_comp_dd0759f6.901f015e68a3f7ed3c4a.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/assets/css/home/a_be05f1f7.3e7c637972682ba4faab.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/assets/css/home/core_comp_0494d315.9a288632807d73baebc5.css') }}" rel="stylesheet"  type="text/css">
        <link href="{{ asset('theme/assets/css/home/front-page.3d2ccd4c7df2f1996669.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/plugins/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"  />
        <link href="{{ asset('theme/plugins/owl-carousel/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('theme/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @stack('styles')
</head>

<body
    class="site com-sppagebuilder view-page no-layout no-task itemid-168 en-gb ltr  sticky-header layout-fluid off-canvas-menu-init">
    <div class="body-wrapper">
        <div class="body-innerwrapper">
            <section id="sp-top-bar">
                <div class="container">
                    <div class="row">
                        <div id="sp-top1" class="col-xs-6 col-sm-6 col-md-6">
                            <div class="sp-column ">
                                <div class="sp-module  hidden-xs">
                                    <div class="sp-module-content">
                                        @php
                                            $dt = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->locale('vi_VN');
                                        @endphp
                                        <div class="mod_datetime">
                                            <time
                                                datetime="{{ $dt->format(' Y-m-d h:i:s') }}">{{ $dt->isoFormat('LLLL') }}</time>
                                        </div>
                                    </div>
                                </div>
                                <div class="sp-module menu-top hidden-xs">
                                    <div class="sp-module-content">
                                        <div class="mod-login">
                                            <nav class="navbar-expand-lg navbar-light bg-light">
                                                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                                                    <ul class="navbar-nav mr-auto yt-loginform">
                                                        @if (Auth::guard('account')->check())

                                                            <li>
                                                                <a class="wishlist label-down link d-xs-show"
                                                                    href="{{ route('fe.account.info') }}">
                                                                    <span class="wishlist-label d-lg-show">Xin chào
                                                                        {{ Auth::guard('account')->user()->name }}</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="nav-link dropdown-toggle"
                                                                    href="{{ route('fe.logout') }}">Đăng xuất</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a class="nav-link dropdown-toggle login-switch"
                                                                    href="{{ route('fe.login.popup') }}"
                                                                    title="Đăng nhập hệ thống">Đăng nhập</a>
                                                            </li>
                                                            <li>
                                                                <a class="nav-link dropdown-toggle"
                                                                    href="{{ route('fe.register') }}">Đăng ký</a>
                                                            </li>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sp-top2" class="col-xs-6 col-sm-6 col-md-6">
                            <div class="sp-column ">
                                <ul class="sp-contact-info"></ul>
                                <ul class="social-icons">
                                    <li><a target="_blank" href="{{ $mainSettings['facebook_url'] }}"><i
                                                class="fab fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="{{ $mainSettings['instagram_url'] }}"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="{{ $mainSettings['pinterest_url'] }}"><i
                                                class="fab fa-pinterest"></i></a></li>
                                    <li><a target="_blank" href="{{ $mainSettings['youtube_url'] }}"><i
                                                class="fab fa-youtube"></i></a></li>
                                    <li><a target="_blank" href="{{ $mainSettings['linkedin_url'] }}"><i
                                                class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <header id="sp-header">
                <div class="container">
                    <div class="row main-menu-cms">
                        <div id="sp-menu">
                            <div class="sp-column ">
                                <div class='sp-megamenu-wrapper'>
                                    <a id="offcanvas-toggler" href="#" aria-label="Menu">
                                        <i class="fa fa-bars" aria-hidden="true" title="Menu"></i>
                                    </a>
                                    <div class="logo-cate-hd">
                                        <div class="logo">
                                            <a href="{{ route('fe.home') }}" class="logo ml-lg-0">
                                                <img class=""
                                                    src="{{ !empty($mainSettings['logo']) ? $mainSettings['logo'] : asset('theme/assets/images/logo.png') }}"
                                                    alt="Logo fin việt nam">
                                            </a>
                                        </div>
                 
                                    @if ($mainMenus)
                                        <ul class="sp-megamenu-parent menu-fade hidden-sm hidden-xs">
                                            @foreach ($mainMenus as $menu)
                                                <li class="sp-menu-item @if ($menu['child']) sp-has-child @endif">
                                                    <a href="{{ $menu['link'] }}">{{ $menu['label'] }} </a>
                                                    @if ($menu['child'])
                                                        @include('front_end.partials.sub-menu-pc',["menu"=>$menu,'isMain'=>true])
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sp-search">
                            <div class="sp-column ">
                                <div class="sp-module smart-search-top">
                                    <div class="sp-module-content">
                                        <form id="mod-finder-searchform" action="{{ route('fe.search.index') }}" method="get" class="form-search" autocomplete="off">
                                            <div id="p-search-form" class="finder smart-search-top searchform @if(!empty(request('q'))) active @endif">
                                                <input type="text" value="{{ request('q') }}" name="q" id="mod-finder-searchword" class="inputbox" placeholder="Bạn cần tìm gì..." size="30" required>
                                                <button type="submit" id="search_button" aria-label="Tìm kiếm"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="icon-user-fin">
                            @if (Auth::guard('account')->check())
                            <a class="wishlist label-down link d-xs-show"
                                href="{{ route('fe.account.info') }}">
                                <i class="fas fa-user"></i>
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle login-switch" href="{{ route('fe.login.popup') }}"
                                title="Đăng nhập hệ thống"><i class="far fa-user"></i></a>
                            @endif
                        </div>

                    </div>
                </div>
            </header>
            @yield('content')
            <section id="sp-newsletter">
                <div class="container">
                    <div class="row">
                        <div id="sp-position1" class="col-sm-12 col-md-12">
                            <div class="sp-column ">
                                <div class="sp-module ">
                                    <div class="sp-module-content">
                                        <div class="acymailing_module" id="acymailing_module_formAcymailing36601">
                                            <div class="acymailing_fulldiv" id="acymailing_fulldiv_formAcymailing36601">
                                                <form id="validate" name= "validate"
                                                    method="POST">
                                                    <div class="acymailing_module_form">
                                                        <div class="acymailing_introtext">Đăng ký nhận thông báo</div>
                                                        <div class="acymailing_finaltext">Tin tức từ Finvn</div>
                                                        <table class="acymailing_form">
                                                            <tr>
                                                                <td class="acyfield_email acy_requiredField">
                                                                    <input class="inputbox cyfield_email acy_requiredField value-acy_requiredField" type="text"
                                                                        name="email" style="width:99.8%"
                                                                        type="email"
                                                                        placeholder="Vui lòng nhập email..." />
                                                                </td>

                                                                <td class="acysubbuttons">
                                                                    <input class="button subbutton btn btn-primary"
                                                                    value="Gửi" type="submit">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="sp-bottom">
                <div class="container">
                    <div class="row">
                        <div id="sp-bottom1" class="col-sm-6 col-md-3">
                            <div class="sp-column ">
                                <div class="sp-module ">
                                    <div class="sp-module-content">
                                        <div class="custom">
                                            <p><img src="{{ !empty($mainSettings['logo_footer']) ? $mainSettings['logo_footer'] : asset('theme/assets/images/logo-footer.png') }}"
                                                    alt="Logo footer" /></p>
                                           <p> {!! $mainSettings['description_footer'] !!} </p>
                                            <p>
                                                <span class="address">{{ $mainSettings['address_company'] }}</span>
                                            </p>
                                            <p>{{ $mainSettings['phone_company'] }}</p>
                                            <p><span><a href="mailto:{{ $mainSettings['admin_email'] }}">{{ $mainSettings['admin_email'] }}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sp-bottom2" class="col-sm-6 col-md-6">
                            <div class="sp-column ">
                                <div class="sp-module  mod_bottom_2">
                                    <div class="sp-module-content">
                                        <div class="custom mod_bottom_2">
                                            @foreach ($footerCategories->chunk(2) as $hotCategories)
                                                <div class="row-fluid footer-top1">
                                                    @foreach ($hotCategories as $cate)
                                                        <div class="span6 item item1 mobile_item1"><a
                                                                href="{{ route('fe.post.category', ['slug' => $cate->slug, 'id' => $cate->id]) }}">
                                                                <img class="img1"
                                                                    src="{{ $cate->thumbnail }}" alt="" /></a>
                                                            <div class="title-desc"><a
                                                                    href="{{ route('fe.post.category', ['slug' => $cate->slug, 'id' => $cate->id]) }}">{{ $cate->title }}</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sp-bottom3" class="col-sm-6 col-md-3">
                            <div class="sp-column ">
                                <div class="sp-module ">
                                    <h3 class="sp-module-title">Popular Tags</h3>
                                    <div class="sp-module-content">
                                        <div id="k2ModuleBox101" class="k2TagCloudBlock">
                                            @foreach ($footerPopularTags as $textLink)
                                                <div class="items-tag">
                                                    <a class="item-tag" href="{{ $textLink->link }}"
                                                        title="{{ $textLink->text }}">
                                                        <span class="name-tag">{{ $textLink->text }}</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                            <div class="clr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sp-module link-contact">
                                    <div class="sp-module-content">
                                        <div class="customlink-contact">
                                            <p><a href="{{ route('fe.contact') }}">Liên hệ</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer id="sp-footer">
                <div class="container">
                    <div class="row">
                        <div id="sp-footer1" class="col-sm-12 col-md-12">
                            <div class="sp-column "><span class="sp-copyright">Copyright © 2021, All Rights
                                Reserved. Designed by <a target="_blank" title="Ladifire Việt Nam"
                                    href="http://ladifire.net/">Ladifire.Net</a></span></div>
                        </div>
                    </div>
                </div>
            </footer>
        </div> <!-- /.body-innerwrapper -->
    </div> <!-- /.body-innerwrapper -->

    <!-- Off Canvas Menu -->
    <div class="offcanvas-menu">
        <a href="#" class="close-offcanvas" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="offcanvas-inner">
            <div class="sp-module _menu">
                <div class="sp-module-content">
                    @if ($mainMenus)
                        <ul class="nav menu">
                            @foreach ($mainMenus as $menu)
                                <li class="item-{{ $menu['id'] }} @if ($menu['child']) deeper parent @endif">
                                    <a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a>
                                    @if ($menu['child'])
                                        @include('front_end.partials.sub-menu-mobile',["menu"=>$menu])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div> <!-- /.offcanvas-inner -->
    </div>
    <!-- /.offcanvas-menu -->

    <!-- Go to top -->
    <a href="javascript:void(0)" class="scrollup" aria-label=""><i class="fas fa-chevron-up"></i></a>

    @stack('footer')

    <script src="{{ asset('theme/assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/js/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/js/jquery.sticky.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/lazyload.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('theme/assets/js/custom.js') }}" type="text/javascript"></script>
    @include('front_end.partials.js.popup')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

    @stack('scripts')

    <!-- Fanpage -->
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=274461070333491&autoLogAppEvents=1"
        nonce="xkoRxGMy"></script>

    @if (!empty($mainSettings['footer']))
        {!! $mainSettings['footer'] !!}
    @endif

    <script>
        $(document).on('click', '.acysubbuttons', function(e) {
            e.preventDefault();
            var email = $('.value-acy_requiredField').val();
            if(email.length == 0) {
                alert('Bạn cần nhập email');
            }
            else {
                $.ajax({
                url: "{{ route('fe.newsletters') }}",
                type: "POST",
                data: {
                    'email': email,
                },
                success: function(data) {
                    if (data == 0) {
                        alert('Email đã tồn tại');
                    } else {
                        alert('Gửi email thành công');
                        $(".value-acy_requiredField").val('');
                    }
                },
                error: function(error) {
                        alert('Cần nhập đúng email');
                },
            })
            }co
        });

    </script>

</body>

</html>
