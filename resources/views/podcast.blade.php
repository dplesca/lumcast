@extends('layouts.master')

@section('title')
	{{ $podcast->title }}
@stop

@section('content')
<div class="two-thirds column">
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
@stop





