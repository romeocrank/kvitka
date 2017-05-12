 @extends('site-layout-grid')
 @section('start-page')
  <link type="text/css" rel="stylesheet" href="{{asset('css/user-start-page.css')}}"/>
    <body class="archive  term-overview term-6" >

      <div id="page-wrapper">

        @include('navbar')

        <div id="main" class="site">
          <div id="content" class="site-content">
             <div class="portfolio-grid" data-aspect-ratio="4:3" data-orientation="vertical" data-columns="5" data-rows="4" oncontextmenu="javascript: return false" > 
              @foreach ($albums as $key=>$album)
                <article data-size="{{$datasize[$key]}}" class="grid-project size-{{$datasize[$key]}}">
                  <a href="{{asset('/albums/'. $album->id)}}" class="preview" style="background-image: url({{ $album->coverPath }}); ">
                      <span class="hover-box">
                          <span class="inner" >
                            <b>{{ $album->title_translated }}</b>
                            <i style = "margin-top:8px;">{{ $album->description_translated }}</i>
                          </span>
                      </span>
                      <img class="hide" src="{{ $album->coverPath }}" alt="">
                  </a>
                </article>
              @endforeach   
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

        </div>
      </footer>

      @include('scripts')
    </body>
  @stop 