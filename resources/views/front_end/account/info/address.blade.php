@extends('front_end.layouts.app')
@section('content')
    <!-- Start of Main -->
    {{ Breadcrumbs::render('fe.account.address')}}
    <main class="main backround-account address-page-account">
        @php
        $provinceId = old('province_id') ? old('province_id'):'';
        $districtId = old('district_id') ? old('district_id'):'';
        $wardId     = old('ward_id') ? old('ward_id'):'';
        if (!empty(Auth::guard('account')->check())) {
        $provinceId = Auth::guard('account')->user()->province;
        $districtId = Auth::guard('account')->user()->district;
        $wardId = Auth::guard('account')->user()->ward;
        $customerNameOrder = Auth::guard('account')->user()->name_order;
        $customerName = Auth::guard('account')->user()->name;
        $customerMobile = Auth::guard('account')->user()->mobile;
        $customerEmail = Auth::guard('account')->user()->email;
        $customerStreet = Auth::guard('account')->user()->street;
        $address = Auth::guard('account')->user()->address;
        $accountId = Auth::guard('account')->user()->id;
    }
        @endphp
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">

                        <div class=" col-md-2 col-12 ">
                            @include('front_end.account.info.link')
                        </div>

                    <div class=" col-md-10 col-12 backround-item-account mt-2 ">
                        <div class="tab-pane" id="account-addresses">
                            <div class="iconf-box iconf-box-side iconf-box-light">
                                <span class="iconf-box-icon icon-map-marker">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <div class="iconf-box-content">
                                    <h4 class="iconf-box-title mb-0 ls-normal">địa chỉ</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Chi tiết địa chỉ</h4>
                                        <address class="mb-4 form-address">

                                            <form action="{{route('fe.account.updateAddress')}}" method="POST">
                                                @csrf
                                                @error('name_order')
                                                <span class="padding-left-20 error invalid-feedback" style="display: block ; color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-group">
                                                    <label class="label-address">Họ và tên <span class="color-red">*</span> </label>
                                                    <input type="text"  value="{{ old('name_order') ?: (!empty($customerNameOrder) ? $customerNameOrder : $customerName) }}" class="form-control input-address-ac"
                                                        name="name_order" required placeholder="Họ và tên">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-address" for="cur-password">Tỉnh,thành phố  <span class="color-red">*</span>  </label>
                                                    <div class="address-choice">
                                                            <select required name="province" id="province_id" class="form-control select2bs4">
                                                                @include('front_end.partials.forms.province',['provinceId'=>$provinceId])
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-address" for="cur-password">Quận,huyện <span class="color-red">*</span> </label>
                                                    <div class="address-choice">
                                                        <select required name="district" id="district_id" class="form-control select2bs4">
                                                            @include('front_end.partials.forms.district',['provinceId'=>$provinceId,'districtId'=>$districtId])
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-address" for="cur-password">Xã,phường  <span class="color-red">*</span></label>
                                                    <div class="address-choice">
                                                        <select required name="ward" id="ward_id" class="form-control select2bs4">
                                                            @include('front_end.partials.forms.ward',['districtId'=>$districtId,'ward_id'=>$wardId])
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('street')
                                                <span class="padding-left-20  error invalid-feedback" style="display: block ; color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-group">
                                                    <label class="label-address">Số nhà, tên đường <span class="color-red">*</span></label>
                                                    <input  required type="hidden" class="address form-control" name="address" placeholder="Địa chỉ *">
                                                    <input value="{{ old('street') ?: (!empty($customerStreet) ? $customerStreet : '') }}" required type="type" class=" form-control input-address-ac" name="street" placeholder="Số nhà , tên đường">

                                                </div>
                                                @error('mobile')
                                                <span class="padding-left-20  error invalid-feedback" style="display: block ; color:red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-group">
                                                    <label class="label-address" for="cur-password">Số điện thoại <span class="color-red">*</span> </label>
                                                    <input type="text" required value="{{ old('mobile') ?: (!empty($customerMobile) ? $customerMobile : '') }}" class="form-control input-address-ac"
                                                        placeholder="Số điện thoại" name="mobile" selected>

                                                </div>



                                                <div class="form-group mt-3 d-block text-align-center">
                                                    <button type="submit" class="btn btn-primary btn-address-update">Cập nhật</button>
                                                </div>
                                            </form>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection

@include('front_end.partials.js.address')



