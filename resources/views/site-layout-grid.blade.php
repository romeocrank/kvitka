  <html lang="en-GB" class="upscale layout-portfolio-grid layout-portfolio-grid-vertical">
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
    </head>

    @yield('start-page')

    @yield('category')

    @yield('other')

</html>