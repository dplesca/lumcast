<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<link rel="shortcut icon" href="/favicon.png">

	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/css/mediaelementplayer.min.css">
	<link rel="stylesheet" href="/css/custom.css">

</head>
<body>
	<div class="container">
		<div class="row logo-row">
			<div class="eleven columns">
				<h1><a data-pjax class="logo" href="/">lumcast</a></h1>
				<small><a href="#newform" class="button" rel="leanModal">Add new podcast</a></small>
			</div>
		</div>

		<div class="row" id="pjax-container">
		@yield('content')
		</div>
		
	</div>
	@include('partials.player')
	@include('partials.newform')
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="/js/jquery.leanmodal.js"></script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/jquery.pjax.js"></script>
	<script src="/js/mediaelement-and-player.min.js"></script>
	<script src="/js/custom.js"></script>
</body>
</html>