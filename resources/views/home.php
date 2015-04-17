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
			<?php foreach($podcasts as $podcast): ?>
			<div class="three columns pod">
				<figure>
					<a href="/<?= str_slug($podcast->title, '-') ?>-<?= $podcast->id ?>"><img class="u-max-full-width" src="<?= $podcast->image ?>" /></a>
					<figcaption>
						<span class="title"><?= $podcast->title ?></span>
					</figcaption>
				</figure>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>