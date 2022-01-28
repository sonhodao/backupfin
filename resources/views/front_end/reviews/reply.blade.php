@foreach($reviews as $review)
<div class="sub_comment_item comment_item width_common">
    <div class="user_status" >
        <a class="avata_coment" href="#">
            <img class="img_avatar" src="{{ Avatar::create((!empty($review->user->name)) ? $review->user->name:'Người dùng')->setForeground('#DDDDDD')->toBase64() }}" alt="{{$review->user->name}}">

        </a>
    </div>
    <div class="content-comment">
        <p class="full_content">
            <span class="txt-name">
                <a class="nickname" href="#" target="_blank"><b>{{(!empty($review->user->name)) ? $review->user->name:'Người dùng'}}</b>
                </a>
            </span>
            {{$review->body}}
        </p>
        <p class="block_like_web width_common">
            <span class="time-com">{{ $review->created_at }}</span>
        </p>
    </div>
</div>
@endforeach
