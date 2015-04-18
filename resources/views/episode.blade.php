@extends('layouts.master')

@section('title')
	{{ $podcast->title }} - {{ $episode->title }}
@stop

@section('content')
   <div class="nine columns">
	<h3><a data-pjax href="/<?= str_slug($podcast->title) ?>-<?= $podcast->id ?>"><?= $podcast->title ?></a> - <?= $episode->title ?></h3>
	<p><?= $episode->description ?></p>
	<a class="button button-primary play" data-title="<?= $podcast->title ?> - <?= $episode->title ?>" data-audio="<?= $episode->mp3_url ?>" href="#">Play episode</a>
</div>

@stop
