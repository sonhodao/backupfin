@extends('front_end.layouts.app')
@section('content')
    <!-- Start of Main -->
        {{ Breadcrumbs::render('fe.resetPassword') }}
        <main class="main login-page page-login-register">
        <div class="page-content">
            <div class="container">
                <div class="login-popup sign-account">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <div class="title-login" role="tablist">
                            Lấy lại mật khẩu
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form action="{{ route('fe.send.mail') }}" method="POST">
                                    @csrf
                                    <div class="form-group input-login-register">
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            placeholder="Nhập email để lấy lại mật khẩu " required>
                                    </div>
                                    @error('email')
                                        <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit" class="btn-login">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
