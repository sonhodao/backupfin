

@if($menu['child'])
    <div class="sp-dropdown @if($isMain) sp-dropdown-main @else sp-dropdown-sub @endif sp-menu-right" style="width: 240px;">
        <div class="sp-dropdown-inner">
            <ul class="sp-dropdown-items">
                @foreach( $menu['child'] as $level1 )
                    <li class="sp-menu-item @if( $level1['child']) sp-has-child @endif">
                        <a  href="{{ $level1['link'] }}">{{ $level1['label'] }} </a>
                        @if($level1['child']) 
                            @include('front_end.partials.sub-menu-pc',["menu"=>$level1,'isMain'=>false])
                        @endif    
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
