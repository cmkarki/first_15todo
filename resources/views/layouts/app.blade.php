<html>
	<head>
		<title>@yield('title')</title>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 -->

 		<link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

 		 <script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>	
 		 <script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>	

 	</head>
	<body>
		@include('layouts.header')
		<div class="container">
  
			@yield('contain')

		</div>
		

		<div class="content">
	@if (Session::has('message'))
		<div class="flash alert-info">
			<p>{{ Session::get('message') }}</p>
		</div>
	@endif
	@if ($errors->any())
		<div class='flash alert-danger'>
			@foreach ( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
 
	@yield('content')
</div>

	

	</body>
</html>
