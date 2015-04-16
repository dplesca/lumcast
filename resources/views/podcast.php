<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Podcasts</title>
</head>
<body>
	<h3><?= $podcast->title ?></h3>
	<ul>
	<?php foreach($episodes as $key => $episode): ?>
		<li><a href="/<?= str_slug($podcast->title, '-')?>-<?= $podcast->id ?>/<?= str_slug($episode->title, '-')?>-<?= $episode->id ?>"><?= $episode->title ?></a></li>
	<?php endforeach; ?>
	</ul>
</body>
</html>