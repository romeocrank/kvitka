<!DOCTYPE html>
<html>
    <head>
    	<meta name="csrf-token" content="{{ csrf_token() }}"> 
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
    	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/dropzone.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/my_css.css')}}"/>
		<script  src="{{asset('js/jquery.2.1.4.min.js')}}"></script> 
		<script  src="{{asset('js/materialize.min.js')}}"></script>	
		<script  src="{{asset('js/dropzone.js')}}"></script>
	</head>

	<body class="html-background">

		@yield('admin-album-edit')
		@yield('admin-album-view')
		@yield('admin-album-url')
	
	</body>
</html>