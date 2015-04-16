<?php 
use App\Podcast;
use App\Episode;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
	$podcasts = Podcast::where('active', 1)->orderBy('last_build_date')->get();
    return view('home', ['podcasts' => $podcasts]);
});

$app->get('/{podcast_slug}-{id}', function($podcast_slug, $id) use ($app) {
	$podcast = Podcast::findOrFail($id);
	$episodes = Episode::where('podcast_id', $podcast->id)->get();
    return view('podcast', ['podcast' => $podcast, 'episodes' => $episodes]);
});

$app->get('/{podcast_slug}-{podcast_id}/{episode_slug}-{episode_id}', function($podcast_slug, $podcast_id, $episode_slug, $episode_id) use ($app) {
	$podcast = Podcast::findOrFail($podcast_id);
	$episode = Episode::findOrFail($episode_id);
    return view('episode', ['podcast' => $podcast, 'episode' => $episode]);
});