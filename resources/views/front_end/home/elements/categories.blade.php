<section id="section-id-1530260602039" class="sppb-section ">
    <div class="sppb-row-container">
        <div class="sppb-row">
            @foreach ($categories as $category)
            @php
            $posts = $postsByCategories->where('pivot.category_id',$category->id);
            @endphp
            <div class="sppb-col-md-4">
                <div class="sppb-column">
                    <div class="sppb-column-addons">
                        <div class="clearfix">
                            <div class="sppb-addon sppb-addon-module list-content">
                                <div class="sppb-addon-content">
                                    <h3 class="sppb-addon-title">{{$category->title}}</h3>
                                    <div class="k2ItemsBlock">
                                        <ul>
                                            @foreach($posts as $post)
                                            @php
                                            $urlImage = get_image_url($post->thumbnail, 'featured');
                                            if($loop->index !=0){
                                                $urlImage = get_image_url($post->thumbnail, 'default');
                                            }
                                            @endphp
                                            <li class="item @if($loop->index!=0) small @endif @if($loop->index==(count($posts)-1)) lastItem @endif">
                                                <div class="main-item item_eff  @if($loop->index==0) main-firt-item @else mini  @endif ">
                                                    <a class="moduleItemImage imageeffect" href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}" title="Continue reading &quot;{{ $post->title }}&quot;">
                                                        <img src="{{$urlImage}}" alt="{{ $post->title }}" />
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="moduleItemTitle">
                                                            <a href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                                                <span>{{ $post->title }}</span></a>
                                                        </h3>
                                                        <ul class="list-cate-date">

                                                            <li class="moduleItemAuthor">
                                                                <a rel="author" title="" href="{{ route('fe.post', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                                                    {{($post->author)?$post->author:$post->user->name}}
                                                                </a>
                                                            </li>
                                                            <!-- Date created -->
                                                            <li class="time-ago">
                                                                - {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}}
                                                            </li>
                                                        </ul>
                                                        <span class="moduleItemHits">{{$post->count_comment}} </span>
                                                    </div>
                                                </div>

                                                <div class="clr"></div>
                                            </li>
                                            @endforeach
                                            <li class="clearList"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
