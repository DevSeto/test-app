<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!! $this->url->htmlLink( 'bootstrap.min.css') !!}
	{!! $this->url->htmlLink( 'bootstrap-theme.min.css') !!}
	{!! $this->url->htmlLink( 'main.css') !!}

	{!! $this->url->htmlScript( 'jquery-213.min.js' ) !!}
	{!! $this->url->htmlScript( 'jquery.dataTables.min.js' ) !!}
	{!! $this->url->htmlScript( 'dataTables.bootstrap4.min.js' ) !!}
	{!! $this->url->htmlScript( 'bootstrap.min.js' ) !!}
	{!! $this->url->htmlScript( 'app.js' ) !!}

	<script>
		var baseUrl = '{{ $this->url->to('/') }}';
	</script>
</head>
<body>
	@include( 'includes.nav' )

	@include( 'includes.notification' )

	<div class="container">
		@yield( 'content' )
	</div>


	<!-- Foot Scripts -->
	@yield( 'scripts' )
	
</body>
</html>

