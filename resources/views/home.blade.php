@extends('layouts.master')

@section('title', "lumcast")

@section('content')
    <?php foreach($podcasts as $podcast): ?>
	<div class="three columns pod">
		<figure>
			<a data-pjax href="/<?= str_slug($podcast->title, '-') ?>-<?= $podcast->id ?>"><img class="u-max-full-width" src="<?= $podcast->image ?>" /></a>
			<figcaption>
				<span class="title"><?= $podcast->title ?></span>
			</figcaption>
		</figure>
	</div>
	<?php endforeach; ?>
@stop