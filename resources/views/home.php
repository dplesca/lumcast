<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Podcasts</title>
</head>
<body>
	<h3>Podcasts</h3>
	<?php foreach($podcasts as $podcast): ?>
	<li><a href="/<?= str_slug($podcast->title, '-') ?>-<?= $podcast->id ?>"><?= $podcast->title ?></a></li>
	<?php endforeach; ?>
</body>
</html>