<div class="sp-module k2-category">
    <h3 class="sp-module-title">Danh mục </h3>
    <div class="sp-module-content">
        <div id="k2ModuleBox124" class="k2CategoriesListBlock k2-category">
            <ul class="level0">
                @foreach ($parentCategories as $item)
                <li>
                    <a href="{{ route('fe.post.category',['slug'=>$item->slug,'id'=>$item->id]) }}">
                        <i class="fas fa-caret-right"></i>
                        <span class="catTitle">{{ $item->title }}</span><span class="catCounter"> ({{$item->posts_count}})</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
