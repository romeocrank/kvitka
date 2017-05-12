@extends('site-layout-grid')
@section('category')

  <body class="archive  term-commercial term-3" >

    <div id="page-wrapper">

      @include('navbar')
      
      <div id="main" class="site" style="height: 3095.4px;">
        <div class="portfolio-grid" data-aspect-ratio="4:3" data-orientation="vertical" data-columns="5" data-rows="4" oncontextmenu="javascript: return false" > 

          @foreach ($albums as $key=>$album)
            <article data-size="1" class="grid-project size-1">
              <a href="{{ action('AlbumsController@show', $album->id)}}" class="preview" style="background-image: url({{ $album->coverPath }}); ">
                  <span class="hover-box">
                      <span class="inner" >
                        <b>{{ $album->title_translated }}</b>
                        <i style = "margin-top:4px;">{{ $album->description_translated }}</i>
                      </span>
                  </span>
                  <img class="hide" src="{{ $album->coverPath }}" alt="">
              </a>
            </article>
          @endforeach  

        </div>
      </div>

      <div id="footer-push"></div>

    </div>

    <footer id="footer">
      <div class="footer-inner clearfix">
        <div class="footer-links">
          <div class="credits"> © Victoria Kvitka </div>
        </div>
        <div class="nav-tip">
            {{trans('interface.use_arrows')}} <a href="#" class="button-minimal icon-left-open-mini" id="key-left"></a><a href="#" class="button-minimal icon-right-open-mini" id="key-right"></a> {{trans('interface.for_navigation')}}
        </div>
      </div>
    </footer>

    @include('scripts')
  </body>
@stop