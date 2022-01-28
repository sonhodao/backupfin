<div class="sp-column ">
    <div id="system-message-container">
    </div>
    <div class="blog" itemscope itemtype="http://schema.org/Blog">

        <div class="items-row row-0 row clearfix">
            <div class="col-sm-12">
                <article class="item column-1 item-featured" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
                    @foreach ($posts as $post)

                    <div class="entry-thumbnail">

                        <div class="entry-image intro-image">
                            <a href="{{ route('fe.post',['slug'=>$post->slug,'id'=>$post->id]) }}">
                                <img src="{{get_image_url($post->thumbnail, 'featured_full')}}" alt="" itemprop="thumbnailUrl" />
                            </a>
                        </div>
                    </div>
                    <div class="entry-header has-post-format">

                        <h2 itemprop="name">
                            <a href="{{ route('fe.post',['slug'=>$post->slug,'id'=>$post->id]) }}">
                                {{$post->title}}</a>
                        </h2>

                        <div class="icons">

                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton-1" aria-label="User tools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon-cog" aria-hidden="true"><i class="fas fa-cog"></i></span>
                                    <span class="caret" aria-hidden="true"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-1">
                                    <li class="print-icon">
                                        <a target="_blank" href="{{ route('fe.post.print',['id'=>$post->id]) }}" title="Print article < {{$post->title}} >"  rel="nofollow">
                                            <span class="icon-print" aria-hidden="true"><i class="fas fa-print"></i></span> Print </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <dl class="article-info">

                            <dt class="article-info-term"></dt>

                            <dd class="createdby" itemprop="author" itemscope itemtype="http://schema.org/Person">
                                <i class="fa fa-user"></i>
                                <span itemprop="name" data-toggle="tooltip" title="Written by ">{{$post->author}}</span>
                            </dd>

                            <dd class="category-name">
                                <i class="far fa-folder-open"></i>
                                <span itemprop="genre" itemprop="genre" data-toggle="tooltip" title="Article Category">{{$post->categories->first()->title}}</span>
                            </dd>

                            <dd class="published hidden-md hidden-xs">
                                <i class="far fa-calendar"></i>
                                <time datetime="2018-10-31T10:29:52+00:00" itemprop="datePublished" data-toggle="tooltip" title="Published Date">
                                    {{\Carbon\Carbon::parse($post->published_at)->format('d/m/Y')}} </time>
                            </dd>

                            <dd class="hits">
                                <span class="fa fa-eye"></span>
                                <meta itemprop="interactionCount" content="{{$post->view_count}}" /> {{$post->view_count}}
                            </dd>

                        </dl>

                        <p>{{$post->excerpt}}</p>
                    </div>
                    <p class="readmore">
                        <a class="btn-readmore" href="{{ route('fe.post',['slug'=>$post->slug,'id'=>$post->id]) }}">
                            Xem thêm ... <i class="fas fa-chevron-right"></i></a>
                    </p>

                    @endforeach
                </article>
                <!-- end item -->
            </div>
            <!-- end col-sm-* -->
        </div>
        @include('front_end.posts.elements.paginate')
    </div>
</div>
