<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	<div class="container-fluid">
		@yield('content')

		@include('partials._footer')
	</div>

	@include('partials._javascript')

	@yield('scripts')

</body>
</html>