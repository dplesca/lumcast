@extends('layouts.master')

@section('title', "lumcast")

@section('content')
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