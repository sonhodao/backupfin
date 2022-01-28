@extends('front_end.layouts.app')
@section('content')
    <!-- Start of Main -->
        {{ Breadcrumbs::render('fe.login') }}
        <main class="main login-page page-login-register">
        <div class="page-content">
            <div class="container">
                <div class="login-popup sign-account">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <div class="title-login" role="tablist">
                            Đăng nhập
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form action="{{ route('fe.signIn') }}" method="POST" >
                                    @csrf
                                    <div class="form-group input-login-register">
                                        <input type="text" name="account"  placeholder="Email/Số điện thoại/Tên đăng nhập "
                                            required>
                                    </div>
                                    <div class="form-group input-login-register ">
                                        <input type="password" name="password" placeholder="Mật khẩu" required
                                            id="ipnPassword">
                                        <div class="eye-password" id="btnPassword">
                                            <svg fill="none" viewBox="0 0 20 12" class="eye">
                                                <path stroke="none" fill="#000" fill-opacity=".54" fill-rule="evenodd"
                                                    d="M19.975 5.823V5.81 5.8l-.002-.008v-.011a.078.078 0 01-.002-.011v-.002a.791.791 0 00-.208-.43 13.829 13.829 0 00-1.595-1.64c-1.013-.918-2.123-1.736-3.312-2.368-.89-.474-1.832-.867-2.811-1.093l-.057-.014a2.405 2.405 0 01-.086-.02L11.884.2l-.018-.003A9.049 9.049 0 0010.089 0H9.89a9.094 9.094 0 00-1.78.197L8.094.2l-.016.003-.021.005a1.844 1.844 0 01-.075.017l-.054.012c-.976.226-1.92.619-2.806 1.09-1.189.635-2.3 1.45-3.31 2.371a13.828 13.828 0 00-1.595 1.64.792.792 0 00-.208.43v.002c-.002.007-.002.015-.002.022l-.002.01V5.824l-.002.014a.109.109 0 000 .013L0 5.871a.206.206 0 00.001.055c0 .01 0 .018.002.027 0 .005 0 .009.003.013l.001.011v.007l.002.01.001.013v.002a.8.8 0 00.208.429c.054.067.11.132.165.197a13.9 13.9 0 001.31 1.331c1.043.966 2.194 1.822 3.428 2.48.974.52 2.013.942 3.09 1.154a.947.947 0 01.08.016h.003a8.864 8.864 0 001.596.16h.2a8.836 8.836 0 001.585-.158l.006-.001a.015.015 0 01.005-.001h.005l.076-.016c1.079-.212 2.118-.632 3.095-1.153 1.235-.66 2.386-1.515 3.43-2.48a14.133 14.133 0 001.474-1.531.792.792 0 00.208-.43v-.002c.003-.006.003-.015.003-.022v-.01l.002-.008c0-.004 0-.009.002-.013l.001-.012.001-.015.001-.019.002-.019a.07.07 0 01-.01-.036c0-.009 0-.018-.002-.027zm-6.362.888a3.823 3.823 0 01-1.436 2.12l-.01-.006a3.683 3.683 0 01-2.178.721 3.67 3.67 0 01-2.177-.721l-.009.006a3.823 3.823 0 01-1.437-2.12l.014-.01a3.881 3.881 0 01-.127-.974c0-2.105 1.673-3.814 3.738-3.816 2.065.002 3.739 1.711 3.739 3.816 0 .338-.047.662-.128.975l.011.009zM8.145 5.678a1.84 1.84 0 113.679 0 1.84 1.84 0 01-3.679 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-login">Đăng nhập</button>
                                    <div class="link-set mt-3">
                                        <a class="reset-password" href="{{ route('fe.resetPassword') }}">Quên mật
                                            khẩu</a>
                                        <a href="{{ route('fe.register') }}">Đăng kí tài
                                            khoản</a>
                                    </div>
                                    <div class="login-IFLxoY">
                                        <div class="_3svg61"></div>
                                        <span class="or-link">HOẶC</span>
                                        <div class="_3svg61"></div>
                                    </div>
                                    <div class="social-icon-link">
                                        <a href="{{ route('fe.login.social',['social'=>"facebook",'provider'>"facebook"]) }}" class="link">
                                            <div class="BnBJFp ml-3">
                                                <i class="fab fa-facebook-f"></i>
                                            </div>
                                            <div class="_1DQYn2">Facebook</div>
                                        </a>
                                        <a href="{{ route('fe.login.social',['social'=>"google",'provider'>"google"]) }}"
                                            class="_1hKScg _2Ct2Hr _1rblAp _2P7qLN">
                                            <div class="BnBJFp-gg _3RUHTS ml-3">
                                                <div class="BnBJFp _3RUHTS ">
                                                    <div class="_30SGUu social-white-background social-white-google-png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_1DQYn2">Google</div>
                                        </a>
                                    </div>
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
@push('scripts')
    <script>
        // step 1
        const ipnElement = document.querySelector('#ipnPassword')
        const btnElement = document.querySelector('#btnPassword')

        // step 2
        btnElement.addEventListener('click', function() {
            // step 3
            const currentType = ipnElement.getAttribute('type')
            // step 4
            ipnElement.setAttribute(
                'type',
                currentType === 'password' ? 'text' : 'password'
            )
        })
    </script>
@endpush
