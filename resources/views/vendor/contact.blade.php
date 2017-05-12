<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/global.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/dropzone.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/my_css.css')}}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script  src="{{asset('js/jquery.2.1.4.min.js')}}"></script>
  </head>

  <body>
  dd('tut');
  <header id="header" class="clearfix">
    <nav class="my-nav-bar no-shadow">
      <div class="nav-wrapper">
        <div class="container my-container">
  
          <a href="{{ asset('/')}}" class="brand-logo hide-on-med-and-down">
            <img src="{{ asset('images/logo.jpg')}}" class="logo-solid">
          </a>

          <a href="{{ asset('/')}}" class="brand-logo hide-on-large-only">
            <img src="{{ asset('images/logo.jpg')}}" class="logo">
          </a>
   
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

          <ul class="left hide-on-med-and-down my-left-ul">
            @if  ( count($categories)>0 )
              @foreach ($categories as $category)
                  <li><a class = "uppercase" href=" {{ asset('/category/'.$category->title)}} ">{{ $category->title }}</a></li>
              @endforeach
            @endif
            <li><a class = "uppercase" href=" {{ asset('/other')}} ">other</a></li>
            <li><a class = "uppercase" href="#!">contacts</a></li>
          </ul>

          <ul class="side-nav" id="mobile-demo">
            @if  ( count($categories)>0 )
              @foreach ($categories as $category)
                  <li><a class = "uppercase" href=" {{ asset('/category/'.$category->title)}} ">{{ $category->title }}</a></li>
              @endforeach
            @endif 
            <li><a class = "uppercase" href=" {{ asset('/other')}} ">other</a></li>
            <li><a class = "uppercase" href="#!">CONTACT</a></li>
          </ul>

        </div>
      </div>
    </nav>
</header>

    @if  ( count($albums)==0 )
      <h3 class="center no-album"> Не существует ни одного главного альбома </h3> 
    @else
      <div class="row center">
        <div class="portfolio-grid" data-columns="5" data-rows="3" style="height: 220px; opacity: 1;">
          @foreach ($images as $image)
            <article data-size="{{$datasize[$i]}}" class="grid-project size-{{$datasize[$i]}}">
              <a href="{{asset('/albums/'. $image->album_id )}}" class="preview" style="background-image: url({{ $image->path }}); ">
                  <span class="hover-box">
                      <span class="inner" >
                        <i>{{ $albums[$i]->description }}</i>    
                        <b>{{ $albums[$i]->title }}</b>
                      </span>
                  </span>
                  <img class="hide" src="{{ $image->path }}">
              </a>
            </article>
          <?php $i = $i+1; ?>
          @endforeach
        </div>
      </div>
    @endif 


    <script  src="{{asset('js/materialize.min.js')}}"></script>
    <script  src="{{asset('js/fastclick.js')}}"></script>
    <script  src="{{asset('js/burger-menu.js')}}"></script>
    <script  src="{{asset('js/helpers.js')}}"></script>
    <script  src="{{asset('js/jquery.fluxus-grid.js')}}"></script>
    <script  src="{{asset('js/jquery.fluxus-lightbox.js')}}"></script>
    <script  src="{{asset('js/jquery.transit.js')}}"></script>
    <script  src="{{asset('js/underscore.min.js')}}"></script>
    <script  src="{{asset('js/old-utils.js')}}"></script>
    <script  src="{{asset('js/old-main.js')}}"></script>
    <script  src="{{asset('js/user.js')}}"></script>
  </body>
</html>