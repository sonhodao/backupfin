<div class="sp-column custom-class">
    @if (!empty($parentCategories))
      @include('front_end.posts.elements.sidebars.parent_category')
    @endif

    @if($category->textLinks && $category->textLinks->isNotEmpty() )
      @include('front_end.posts.elements.sidebars.text_links')
    @endif
</div>