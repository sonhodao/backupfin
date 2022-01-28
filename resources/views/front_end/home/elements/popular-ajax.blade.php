@foreach($posts as $post)
    <div class="ltabs-item new-ltabs-item">
        <div class="item-inner">
            <div class="item-image">
                <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}"
                    title="{{ $post->title }}">
                    <img
                        src="{{ get_image_url($post->thumbnail, 'default')}}"
                        alt="{{ $post->title }}" />
                </a>
            </div>

            <div class="item-content">
                <div class="item-info">
                    <ul>
                        <li class="item-author">{{$post->categories->first()->title}}</li>
                        <li class="item-date">
                            - {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}
                        </li>
                    </ul>
                    <div class="item-comment">
                        <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}#itemCommentsAnchor">
                            {{$post->count_comment}}
                        </a>
                    </div>
                </div>
                <div class="item-title">
                    <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}"
                        title="{{ $post->title }}">
                        {{ $post->title }}
                    </a>
                </div>
                <div class="item-description">
                    {{ $post->excerpt }}
                </div>

            </div>
        </div>
    </div>
@endforeach