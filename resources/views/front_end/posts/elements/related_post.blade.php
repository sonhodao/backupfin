<div class="itemRelated">
    <h3>Bài viết liên quan</h3>
    <ul class="row">
        @foreach ($relatedPosts as $item)
        <li class="@if($loop->index%2==0) even @else odd @endif col-md-6">
            <a class="itemRelTitle" href="{{ route('fe.post',["slug"=>$item->slug,'id'=>$item->id]) }}">{{ $item->title }}</a>
            <div class="itemRelatedInfo">
                <div class="itemDateCreated">
                    <i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($item->published_at)->format('d/m/Y')}}
                </div>
            </div>
        </li>
        @endforeach
        <li class="clr"></li>
    </ul>
    <div class="clr"></div>
</div>
