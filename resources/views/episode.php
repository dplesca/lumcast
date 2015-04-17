<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Podcasts</title>

	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
	<script src="//vjs.zencdn.net/4.12/video.js"></script>
	<style>
	h3{font-weight: 600;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="two-third column" style="margin-top:20px;">
				<h3><a href="/<?= str_slug($podcast->title) ?>-<?= $podcast->id ?>"><?= $podcast->title ?></a></h3>
				<h4><?= $episode->title ?></h4>
				<p><?= $episode->description ?></p>
				<audio id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" controls width="340" height="340" poster="http://placehold.it/340x340" data-setup='{}'>
					<source src="<?= $episode->mp3_url ?>" type="audio/mp3">
				</audio>
			</div>
		</div>
	</div>
</body>
</html>