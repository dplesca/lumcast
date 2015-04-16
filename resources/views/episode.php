<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Podcasts</title>
</head>
<body>
	<h3><a href="/<?= str_slug($podcast->title) ?>-<?= $podcast->id ?>"><?= $podcast->title ?></a></h3>
	<h4><?= $episode->title ?></h4>
	<p><?= $episode->description ?></p>
	<audio src="<?= $episode->mp3_url ?>" controls>
		<p>Your browser does not support the <code>audio</code> element </p>
	</audio>
</body>
</html>