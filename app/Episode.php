<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model {

	public function podcast()
    {
        return $this->belongsTo('App\Podcast');
    }

	public static function getLatestEpisodes(){
		$episodes = Episode::where('pub_date', '>', date('Y-m-d H:i:s', strtotime('-1 week')))->select('id', 'title', 'podcast_id', 'pub_date')->orderBy('pub_date', 'desc')->get();
		foreach ($episodes as $episode) {
			$episode->podcast = $episode->podcast;
			$episode->description = nl2br(strip_tags($episode->description, '<a>'));
		}
		return $episodes->toArray();
	}
}