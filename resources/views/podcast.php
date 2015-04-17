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
		<div class="row">
			<div class="two-thirds column" style="margin-top:20px;">
				<h3><?= $podcast->title ?></h3>
				<p><img src="<?= $podcast->image ?>" class="u-pull-left left-image" width="200" alt=""><?= $podcast->description ?></p>
				<ul>
					<?php foreach($episodes as $key => $episode): ?>
					<li><a href="/<?= str_slug($podcast->title, '-')?>-<?= $podcast->id ?>/<?= str_slug($episode->title, '-')?>-<?= $episode->id ?>"><?= $episode->title ?></a> - <?= $episode->description ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>