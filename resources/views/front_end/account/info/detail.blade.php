@extends('front_end.layouts.app')
@section('content')
    <!-- Start of Main -->
    {{ Breadcrumbs::render('fe.account.detail')}}
    <main class="main backround-account detail-page-account">
        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">

                        <div class=" col-md-2 col-12">
                            @include('front_end.account.info.link')
                        </div>
                    <div class=" col-md-10 col-12 mt-2">
                        <div class="backround-item-account detail-icon" >
                            <div class="iconf-box iconf-box-side iconf-box-light ">
                                <span class="iconf-box-icon mr-2 mb-3">
                                    <i class="far fa-user"></i>
                                </span>
                                <div class="iconf-box-content">
                                    <h4 class="iconf-box-title mb-0 ls-normal">Chi tiết tài khoản</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{route('fe.editAccount')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="fs16" for="email_1">Tên đăng nhập : </label>
                                    <b>{{Auth::guard('account')->user()->username}}</b>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fs16">Họ và tên <span class="color-red">*</span></label>
                                    <input type="text" id="display-name" name="name" value="{{Auth::guard('account')->user()->name}}"
                                        class="form-control form-control-md mb-0 fs16 input-detail-ac" required>
                                    <p class=" mt-2 fs16">Đây sẽ là cách tên của bạn sẽ được hiển thị trong phần địa chỉ mua hàng</p>
                                </div>

                                <div class="form-group mb-6">
                                    <label class="fs16" for="email_1">Địa chỉ email: </label>
                                    <b>{{Auth::guard('account')->user()->email}}</b>
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">Thay đổi mật khẩu</h4>
                                <div class="form-group">
                                    <label class="text-dark fs16" for="cur-password">Mật khẩu hiện tại <span class="color-red">*</span> </label>
                                    <input type="password" class="form-control form-control-md fs16 input-detail-ac"
                                        id="cur-password" name="cur_password" placeholder="******" required>
                                        @error('cur_password')
                                        <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="text-dark fs16" for="new-password">Mật khẩu mới <span class="color-red">*</span></label>
                                    <input type="password" class="form-control form-control-md fs16 input-detail-ac"
                                        id="new-password" name="password" placeholder="******" required>
                                        @error('password')
                                        <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark fs16" for="conf-password">Xác nhận mật khẩu <span class="color-red">*</span></label>
                                    <input type="password" class="input-detail-ac form-control form-control-md @error('conf_password') is-invalid @enderror""
                                        id="conf-password" name="conf_password" placeholder="******" required>

                                        @error('conf_password')
                                        <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection

