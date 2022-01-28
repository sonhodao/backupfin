@extends('front_end.layouts.app')
@if(!empty($mainSettings['seo_schema']))
@section('seo_schema')
{!! $mainSettings['seo_schema'] !!}
@endsection
@endif
@section('content')
<section id="sp-main-body">
    <div class="row">
        <div id="sp-component" class="col-sm-12 col-md-12">
            <div class="sp-column ">
                <div id="system-message-container">
                </div>
                <div id="sp-page-builder" class="sp-page-builder  page-1">
                    <div class="page-content">
                        @include("front_end.home.elements.hot")  
                        @include("front_end.home.elements.trendings")  
                        <section id="section-id-banner" class="sppb-section ">
                            <div class="sppb-row-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-md-12">
                                        <div id="column-id-1530257281185" class="sppb-column">
                                            <div class="sppb-column-addons">
                                                <div id="sppb-addon-1530257281189" class="clearfix">
                                                    <div class="sppb-addon sppb-addon-module ">
                                                        <div class="sppb-addon-content">
                                                            <div class="bannergroup">

                                                                <div class="banneritem">
                                                                    @if($bannerHomeCenter)
                                                                    <a href="{{ $bannerHomeCenter->link }}" style="text-align: center">
                                                                        <img src="{{ $bannerHomeCenter->thumbnail }}" alt="{{$bannerHomeCenter->title}}">
                                                                    </a>
                                                                    @else 
                                                                    <img src="{{'theme/assets/images/ads-2.jpg'}}" alt="banner mid" />
                                                                    @endif
                                                                    
                                                                    <div class="clr"></div>
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
                        @include("front_end.home.elements.popular")  
                        @include("front_end.home.elements.latest") 
                        @include("front_end.home.elements.categories") 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

