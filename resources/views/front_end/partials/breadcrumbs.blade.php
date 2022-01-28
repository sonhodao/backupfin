
@if (count($breadcrumbs))
<section id="sp-section-4">
    <div class="container">
        <div class="row">
            <div id="sp-breadcrumb" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div class="sp-module ">
                        <div class="sp-module-content">
                            <ol class="breadcrumb">
                                @foreach ($breadcrumbs as $breadcrumb)
                                    @if ($breadcrumb->url && !$loop->last)
                                        <li><a href="{{ $breadcrumb->url }}"  class="pathway">{{ $breadcrumb->title }}</a></li>
                                    @else
                                        <li class="active"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif