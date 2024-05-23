<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>
<body>
	@include('templates.navbar')

	<div class="container mt-3">
		@yield('content')
	</div>	

<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('js/bootstrap.js') }}"></script>
</body>
</html>	