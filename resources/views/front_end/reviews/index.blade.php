@foreach($reviews as $review)
<div class="main_show_comment width_common mb10" id="list_comment" style="transform-origin: 0px 0px; opacity: 1; transform: scale(1, 1);">
    <div class="comment_item width_common">
        <div class="user_status" >
            <a class="avata_coment" href="#">
                <img class="img_avatar" src="{{ Avatar::create((!empty($review->user->name)) ? $review->user->name:'Người dùng')->setForeground('#DDDDDD')->toBase64() }}" alt="{{$review->user->name}}">

            </a>
        </div>
        <div class="content-comment">
            <p class="content_less" rel="content_more">
                <span class="txt-name">
                    <a class="nickname" href="#" target="_blank"><b>{{(!empty($review->user->name)) ? $review->user->name:'Người dùng'}}</b>
                    </a>
                </span>
                {{$review->body}}
            </p>

            <p class="block_like_web width_common">
                <a id="{{ $review->id }}" class="link_thich" href="javascript:;">
                    <span class="total_like" >{{($review->count_like>0) ? $review->count_like:''}}</span><i class="ic ic-like"></i>
                </a>
                <a id="{{ $review->id }}" class="link_reply" href="javascript:;">Trả lời</a>
                <!--<a href="javascript:;" class="share_cmt_fb">Chia sẻ</a>-->
                <span class="time-com">{{ $review->created_at }}</span>
            </p>
        </div>
        <div class="sub_comment width_common clearfix"></div>
        @if($review->childrens_count>0)
            <p class="count-reply"><a href="javascript:;" class="view_all_reply" rel="{{$review->id}}"><span class="num_reply_cmt">{{$review->childrens_count}}</span> trả lời</a></p>
        @endif
    </div>

</div>
@endforeach
