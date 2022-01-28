<div class="sp-module tag-cloud">
    <h3 class="sp-module-title">Tag</h3>
    <div class="sp-module-content">
        <div id="k2ModuleBox101" class="k2TagCloudBlock">
            @foreach ($category->textLinks as $textLink)
            <div class="items-tag">
                <a class="item-tag" href="{{ $textLink->link }}" title="{{ $textLink->text }}">
                    <span class="name-tag">{{ $textLink->text }}</span>
                </a>
            </div>
            @endforeach
            <div class="clr"></div>
        </div>
    </div>
</div>
