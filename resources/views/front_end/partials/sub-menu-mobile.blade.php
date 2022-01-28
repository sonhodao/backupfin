@if( $menu['child'])
    <span class="offcanvas-menu-toggler collapsed" data-toggle="collapse" data-target="#collapse-menu-{{$menu['id']}}">
        <i class="open-icon fa fa-angle-down"></i>
        <i class="close-icon fa fa-angle-up"></i>
    </span>
    <ul class="collapse" id="collapse-menu-{{$menu['id']}}">
        @foreach( $menu['child'] as $level1 )
            <li class="dropdown-item" href="#">
                <a class="item-{{$menu['id']}}" href="{{ $level1['link'] }}">{{ $level1['label'] }}</a>
                @if( $level1['child'])
                    @include('front_end.partials.sub-menu-mobile',["menu"=>$level1])
                @endif   
            </li>
        @endforeach
    </ul>
@endif
