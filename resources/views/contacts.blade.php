<html class="upscale horizontal-page">
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
 
  <body class="archive tax-fluxus-project-type term-overview term-6">

    <div id="page-wrapper">

    @include('navbar')

      <div id="main" class="site">
        <div class="slider">
            <div class="slide image-center-center active" id="slide-307" data-image="" style="visibility: visible; opacity: 1; background-image: url(http://dannynorth.co.uk/contact/);">                   
              <article class="info black no-fade style-page-with-background" style="" data-position="center" data-top="30.78%" data-left="41.95%">
                <div class="viewport" style="text-align: center;">
                  <h1 class="entry-title">{{trans('interface.contacts')}}</h1>
                  <div class="entry-content">


                    <p class="tel" style="text-align: center;">+38(099)665-07-70</p>

                    <p><a href="mailto:victoriakvitka@gmail.com">victoriakvitka@gmail.com</a></p>

                    <p style=" margin-top: 4vh;">   

                      <a class = "social-networks" href="https://www.instagram.com/v.kvitka">
                        <i class="fa fa-instagram"></i>
                      </a>

                      <a class = "social-networks" href="https://www.facebook.com/VictoriaKvitkaPhotographer​">
                        <i class="fa fa-facebook-square"></i>
                      </a>

                      <a class = "social-networks" href="https://vk.com/magicvictoriakvitka">
                        <i class="fa fa-vk"></i>
                      </a>
                    </p>

                </div>
              </div>
            </article>            
          </div>
        </div>
      </div>

      <div id="footer-push"></div>
    </div><!-- #page-wrapper -->

    <footer id="footer">
      <div class="footer-inner clearfix">

        <div class="footer-links">
          <div class="credits">© Victoria Kvitka</div>        
        </div>

      </div>
    </footer>

    @include('scripts')
  </body>
</html>