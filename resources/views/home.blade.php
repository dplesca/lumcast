@extends('layouts.master')

@section('title', "lumcast")

@section('content')
	<h3>Latest episodes</h3>
	<?php foreach($latest as $episode): ?>
		<div class="twelve columns latest-episode">
			<h6><a data-pjax href="/<?= str_slug($episode['podcast']['title'], '-') ?>-<?= $episode['podcast_id'] ?>/<?= str_slug($episode['title'], '-') ?>-<?= $episode['id'] ?>"><?= $episode['podcast']['title'] ?> - <?= $episode['title'] ?></a> (published on <?= substr($episode['pub_date'], 0, 10) ?>)</h6>
		</div>
	<?php endforeach ?>
	<h3>Podcasts</h3>
    <?php foreach($podcasts as $index => $podcast): ?>
	<div class="three columns pod<?php if (!($index%4)):?> m0<?php endif;?>">
		<figure>
			<a data-pjax href="/<?= str_slug($podcast->title, '-') ?>-<?= $podcast->id ?>"><img class="u-max-full-width" src="<?= $podcast->image ?>" /></a>
			<figcaption>
				<span class="title"><?= $podcast->title ?></span>
			</figcaption>
		</figure>
	</div>
	<?php endforeach; ?>
@stop