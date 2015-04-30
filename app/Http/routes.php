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
	$episodes = Episode::where('podcast_id', $podcast->id)->orderBy('pub_date', 'desc')->take(15)->get();
    return view('podcast', ['podcast' => $podcast, 'episodes' => $episodes]);
});

$app->get('/{podcast_slug}-{podcast_id}/{episode_slug}-{episode_id}', function($podcast_slug, $podcast_id, $episode_slug, $episode_id) use ($app) {
	$podcast = Podcast::findOrFail($podcast_id);
	$episode = Episode::findOrFail($episode_id);
    return view('episode', ['podcast' => $podcast, 'episode' => $episode]);
});

$app->post('/new', function() use ($app){
	$r = ['status' => 0];
	$link = Request::input('link');
	try{
		$xml = simplexml_load_file($link, null, LIBXML_NOCDATA);
		if ($xml !== false){
			$podcast = [
				'title' => (string)$xml->channel->title,
				'description' => (string)$xml->channel->description,
				'url' => $link,
				'image' => (string)$xml->channel->image->url,
				'active' => 1
			];
			Podcast::create($podcast);
			$r['status'] = 1;
		}
	} catch(Exception $e){
		return $r;
	}
	return $r;
});