<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
	@yield('stylesheets')
</head>
<body>
	<div class="container-fluid">
		@yield('content')

		@include('partials._footer')
	</div>


</body>
	@include('partials._javascript')

	@yield('scripts')
</html>