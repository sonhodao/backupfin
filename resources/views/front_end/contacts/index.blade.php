@extends('front_end.layouts.app')

@if(!empty($page->seo->schema))
@section('seo_schema')
{!! $page->seo->schema !!}
@endsection
@endif
@section('breadcrumbs')
{{Breadcrumbs::view('breadcrumbs::json-ld', 'fe.contact')}}
@stop
@section('content')
<!-- Start of Main -->

<!-- End of Breadcrumb -->
{{ Breadcrumbs::render('fe.contact') }}

<section id="sp-main-body" class="page-content contact-us">
    <div class="container">
        <div class="row">
            <section class="content-title-section ">
                <h3 class="title title-center mb-3">{{ $mainSettings['site_name'] }}
                </h3>
                <p class="text-center">{{ $mainSettings['address_company'] }}</p>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section">
                <div class="row text-center">
                    <div class="contact-email-phone">
                        <div class="iconf-box  iconf-box-primary">
                            <span class="iconf-box-icon iconf-email">
                                <i class="far fa-envelope"></i>
                            </span>
                            <div class="iconf-box-content">
                                <h4 class="iconf-box-title">Địa chỉ E-mail</h4>
                                <p>{{ $mainSettings['admin_email'] }} </p>
                            </div>
                        </div>
                        <div class="iconf-box iconf-box-primary">
                            <span class="iconf-box-icon iconf-headphone">
                                <i class="fas fa-headphones"></i>
                            </span>
                            <div class="iconf-box-content">
                                <h4 class="iconf-box-title">Điện thoại</h4>
                                <p>{{ $mainSettings['hotline'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <div class="form-contact mb-8">
                        <h4 class="title mb-3">Vui lòng nhập thông tin liên hệ</h4>
                        <form class="form contact-us-form" action="{{ route('fe.contact') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username">Họ và tên</label>
                                <input type="text" id="username" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name')
                                <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile_1">Điện thoại</label>
                                <input type="text" id="mobile_1" name="mobile" value="{{ old('mobile') }}" class="form-control">
                                @error('mobile')
                                <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email_1">Địa chỉ email</label>
                                <input type="email" id="email_1" name="email" value="{{ old('email') }}" class="form-control">
                                @error('email')
                                <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Nội dung</label>
                                <textarea id="message" name="content" value="{{ old('content') }}" cols="30" rows="5" class="form-control"></textarea>
                                @error('content')
                                <span class="error invalid-feedback" style="display: block ; color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <div class="g-recaptcha" data-sitekey="{{config('admin.captcha-key')}}"></div>
                                <br />
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" style="display:block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-rounded">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <div class="google-map contact-google-map" id="googlemaps">
            <iframe src="{{ $mainSettings['map_url'] }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- End Map Section -->
    </div>
</section>

@endsection
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
