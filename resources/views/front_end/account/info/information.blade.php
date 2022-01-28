@extends('front_end.layouts.app')
@section('content')
<!-- Start of Main -->
{{ Breadcrumbs::render('fe.account.info')}}
<section id="sp-main-body" class="main backround-account info-page-account">
    <div class="container">
        <div class="row">
            <!-- Start of Page Header -->
            <div class=" page-header-account">

                <div class="container backround-item-account-title ">
                    <p class="greeting fs16 mb-0">
                        Xin chào
                        <span class="text-dark font-weight-bold">{{Auth::guard('account')->user()->name}}</span>
                        (không phải
                        <span class="text-dark font-weight-bold">{{Auth::guard('account')->user()->name}}</span>?
                        <a href="{{route('fe.logout')}}" class="text-primary">Đăng xuất</a>)
                    </p>

                </div>

            </div>
            <!-- End of Page Header -->
            <!-- Start of PageContent -->
            <div class="page-content ">
                <div class="container">
                    <div class="tab tab-vertical row ">
                        <div class=" col-lg-2 col-md-2 col-xs-12 ">
                            @include('front_end.account.info.link')
                        </div>

                        <div class="tab-content mb-6 col-md-10 col-xs-12 box-shadow-ccc ">
                            <div class="tab-pane active in" id="account-dashboard">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 mb-4">
                                        <a href="{{route('fe.account.address')}}" class="link-to-tab">
                                            <div class="iconf-box text-center">
                                                <span class="iconf-box-icon iconf-address">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                                <div class="iconf-box-content">
                                                    <p class="text-uppercase mb-0">Địa chỉ</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 mb-4">
                                        <a href="{{route('fe.account.detail')}}" class="link-to-tab">
                                            <div class="iconf-box text-center">
                                                <span class="iconf-box-icon iconf-account">
                                                    <i class="far fa-user"></i>
                                                </span>
                                                <div class="iconf-box-content">
                                                    <p class="text-uppercase mb-0">Chi tiết tài khoản</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 mb-4">
                                        <a href="{{route('fe.logout')}}">
                                            <div class="iconf-box text-center">
                                                <span class="iconf-box-icon iconf-logout">
                                                    <i class="fa fa-sign-out-alt"></i>
                                                </span>
                                                <div class="iconf-box-content">
                                                    <p class="text-uppercase mb-0">Đăng xuất</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </div>
    </div>
</section>

@endsection
