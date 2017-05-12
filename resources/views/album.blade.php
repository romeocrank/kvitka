<!DOCTYPE html>
<html  class="upscale horizontal-page">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/styles.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/global.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/grid.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/fontello.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/fluxus-customize.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/user.css')}}"/>
    <script  src="{{asset('js/jquery.js')}}"></script>
</head>

<body class="single single-fluxus_portfolio postid-1349" >
    <div id="page-wrapper">

    @include('navbar')

    <div id="main" class="site site-with-sidebar">
        <div id="content" class="site-content">
            <article class="portfolio-single horizontal-content" data-loading="Please wait..." data-lazy="">

                @if (count($images)>0)
                    @foreach ($images as $image)
                        <div class="horizontal-item project-image" oncontextmenu="javascript: return false" >
                            <figure>
                                <img class="image" src="{{ asset($image->path) }}" width="{{ $image->width }}" height="{{ $image->height }}" alt="'victoria kvitka-'.$album->title" >
                            </figure>
                        </div>
                    @endforeach
                @endif

            </article>
        </div>

        <div class="sidebar sidebar-portfolio-single widget-area">
            <div class="scroll-container">

                <div class="scrollbar">
                    <div class="track" >
                        <div class="thumb">
                            <div class="end"> </div>
                        </div>
                    </div>
                </div>

                <div class="viewport">
                    <div class="overview" style="top: 0px;">
                        <hgroup>
                            <h1 class="title">{{ $album->title_translated }}</h1>
                        </hgroup>
                        <div class="widget">
                            <div class="textwidget">
                                <p>{{ $album->description_translated }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="footer-push"></div>

</div>

<footer id="footer">
    <div class="footer-inner clearfix">

        <div class="footer-links">
            <div class="credits">© Victoria Kvitka</div>
        </div>

        <div class="nav-tip" style="display: block;">{{trans('interface.previous')}}
            <a href="#" class="button-minimal icon-left-open-mini" id="key-left"></a>
            <a href="#" class="button-minimal icon-right-open-mini" id="key-right"></a>{{trans('interface.next')}}
        </div>

    </div>
</footer>

@include('scripts')
</body>
</html>