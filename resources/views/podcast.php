<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Podcasts</title>

	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/css/custom.css">
</head>
<body>
	<div class="container">
		<div class="row logo-row">
			<div class="nine columns">
				<h1><a class="logo" href="/">lumcast</a></h1>
			</div>
		</div>
		<div class="row" id="pjax-container">
			<div class="two-thirds column" style="margin-top:20px;">
				<div>
					<h2><?= $podcast->title ?></h2>
					<p><img src="<?= $podcast->image ?>" class="u-pull-left left-image" width="200" alt=""><?= $podcast->description ?></p>
				</div>
				<div class="u-cf">
					<h3>Episodes</h3>
					<ul>
						<?php foreach($episodes as $key => $episode): ?>
						<li><a data-pjax href="/<?= str_slug($podcast->title, '-')?>-<?= $podcast->id ?>/<?= str_slug($episode->title, '-')?>-<?= $episode->id ?>"><?= $episode->title ?></a> - <?= $episode->description ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="/js/jquery.pjax.js"></script>
	<script>
	$(function(){
		$(document).pjax('a[data-pjax]', '#pjax-container', { "fragment": "#pjax-container" });
	});
	</script>
</body>
</html>