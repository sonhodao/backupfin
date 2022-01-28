@extends('front_end.layouts.app-print')

@section('content')
<main class="main">
    <section id="sp-main-body" class="page-detail">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column ">
                        <div id="system-message-container"></div>
                        <span id="startOfPageId12"></span>
                        <div id="k2Container" class="itemView">
                            <div class="itemHeader">
                                <h2 class="itemTitle"> {!! $post->title !!} </h2>
                            </div>
                            <div class="itemBody">
                                <div class="itemIntroText">{!! $post->excerpt !!}</div>
                                <div class="itemFullText">{!! $post->content !!}</div>
                                <div class="clr"></div>
                                <div class="itemContentFooter">
                                    <div class="clr"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
