<div class="sppb-col-md-4">
    <div id="column-id-1530257330778" class="sppb-column">
        <div class="sppb-column-addons">
            <div id="sppb-addon-1530257571369" class="clearfix">
                <div class="sppb-addon sppb-addon-module ">
                    <div class="sppb-addon-content">
                        <h3 class="sppb-addon-title">Follow Us</h3>
                        <div id="sj_social_media_counts_11373361801637638871" class="sj-social-media-counts style1">
                            <div class="sc-wrap cf">
                                <div class="fb-like-button sc-item">
                                    <div class="sc-item-inner">
                                        <a href="{{ $mainSettings["facebook_url"] }}" title="" target="_blank">
                                            <span class="like-social">
                                                <span class="fa-facebook-square"></span>
                                                <!--<span class="like-count">0</span>-->
                                            </span>
                                            <span class="like-text">Like </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="twitter-like-button  sc-item ">
                                    <div class="sc-item-inner">
                                        <a href="{{ $mainSettings["twitter_url"] }}" title="" target="_blank">
                                            <span class="like-social">
                                                <span class="fa-twitter-square"></span>
                                                <!--<span class="like-counts"><span class="number-count">1324</span></span>-->
                                            </span>
                                            <span class="like-text">Followers </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="youtube-subscribers-button  sc-item ">
                                    <div class="sc-item-inner">
                                        <a href="{{ $mainSettings["youtube_url"] }}" title="" target="_blank">
                                            <span class="like-social">
                                                <span class="fa-youtube-square"></span>
                                               <!-- <span class="like-counts"><span class="number-count">261</span></span>-->
                                            </span>
                                            <span class="like-text">Subscribers </span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sppb-addon-1530257819855" class="clearfix">
                <div class="sppb-addon sppb-addon-module banner-ads">
                    <div class="sppb-addon-content">
                        <div class="bannergroup">

                            <div class="banneritem">
                                @if($bannerHomeRight)
                                <a href="{{ $bannerHomeRight->link }}" style="text-align: center">
                                    <img src="{{ $bannerHomeRight->thumbnail }}" alt="{{$bannerHomeRight->title}}">
                                </a>
                                @else
                                <img src="{{'theme/assets/images/ads-3.jpg'}}" alt="banner right" />
                                @endif
                                <div class="clr"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="sppb-addon-1530258335746" class="clearfix">
                <div class="sppb-addon sppb-addon-module ">
                    <div class="sppb-addon-content">
                        <div class="moduletable  sppb-addon-most-popular">
                            <div id="sj_extra_slider_2801456301637638871" class="sj-extra-slider buttom-type1 extra-resp00-1extra-resp01-1 extra-resp02-1 extra-resp03-1 extra-resp04-1  button-type1">
                                <div class="heading-title">Most Popular
                                </div>
                                <div class="extraslider-inner" data-effect="none">
                                    <div class="item ">

                                        @foreach ($mosts as $most)
                                        <div class="item-wrap style1">
                                            <div class="item-wrap-inner">
                                                <div class="item-info">
                                                    <div class="item-title">
                                                        <a href="{{route('fe.post',['slug'=>$most->slug,'id'=>$most->id])}}" title="{{$most->title}}">
                                                            {{$most->title}}
                                                        </a>
                                                    </div>

                                                    <ul>
                                                        <li class="item-author">
                                                            {{$most->categories->first()->title}}
                                                            <span></span>
                                                        </li>
                                                        <li class="item-date">
                                                            - {{\Carbon\Carbon::parse($most->published_at)->format('d/m/Y')}}</li>
                                                    </ul>
                                                    <div class="item-comment">
                                                        <a href="{{route('fe.post',['slug'=>$most->slug,'id'=>$most->id])}}">
                                                            {{$post->count_comment}} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
