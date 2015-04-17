<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Podcasts</title>

	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<style>
	h3{font-weight: 600;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="one-half column" style="margin-top:20px;">
				<h3><?= $podcast->title ?></h3>
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