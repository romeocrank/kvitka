  <header id="header" class="clearfix">
    <hgroup>
      <h1 class="site-title">
        <a href="{{ action('AlbumsController@index')}}" title="Victoria Kvitka" rel="home">
          <img class="logo" src="{{ asset('images/logo.jpg') }}" alt="" >
          <img class="logo-retina" src="{{ asset('images/logo.jpg') }}" alt="">
        </a>
      </h1>
    </hgroup>

    <div class="site-navigation" data-menu="Menu">
      <nav class="primary-navigation">
        <ul id="menu-portfolio" class="menu">

          @if ( count($categories)>0 )
            @foreach ($categories as $category)
              <li id="menu-item-{{ $category->id }}" class="menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-{{ $category->id }}
                @if($thiscategory)
                  @if ($thiscategory->title==$category->title) 
                    current-menu-item 
                  @endif
                @endif
              ">
                <a href="{{ action('CategoriesController@show', $category->id)}}">{{ $category->title_translated }}</a>
              </li>
            @endforeach
          @endif

          <li id="menu-item-000" class="menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-000 
            @if ($other) 
              current-menu-item 
            @endif
          ">
            <a href="{{ action('CategoriesController@show', 'other' )}}">{{trans('interface.other')}}</a>
          </li>

          <li id="menu-item-002" class="menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-002
            @if( $isContacts  )
              current-menu-item
            @endif
          ">
            <a href="{{ action('CategoriesController@contacts')}}">{{trans('interface.contacts')}}</a>
          </li>


{{-- 
        @if(! $isIndex )
          @if( $isAlbum)
            <li id="menu-item-001" class="menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-001">
              @if($other)
                <a href="{{ action('CategoriesController@show', 'other' )}} ">{{trans('interface.back')}}</a>
              @else
                <a href="{{ action('CategoriesController@show', $thiscategory->id )}} ">{{trans('interface.back')}}</a>
              @endif
            </li>
          @else
            <li id="menu-item-001" class="menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-001">
                <a href="{{ action('AlbumsController@index' )}} ">{{trans('interface.back')}}</a>
            </li>
          @endif
        @endif
 --}}

      </ul>

      <li id="menu-item-003" class="right-menu-item  menu-item menu-item-type-taxonomy menu-item-object-fluxus-project-type menu-item-002">
        <ul class="language_bar_chooser">
            @foreach($supported_locales as $localeCode => $properties)
              <li @if(isset($properties['current'])) class="current-menu-item" @endif>
                <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                    {{{ $properties['native'] }}}
                </a>
              </li>
            @endforeach
        </ul>
      </li>

      </nav>    
    </div>
  </header>
