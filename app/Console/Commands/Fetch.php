<?php namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Podcast;
use App\Episode;

class Fetch extends Command {
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'fetch';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fetch recent episodes of podcasts';
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$podcasts = Podcast::where('active', 1)->get();
		foreach ($podcasts as $podcast) {
			$xml = simplexml_load_file($podcast->url, null, LIBXML_NOCDATA);
			$last_build = date('Y-m-d H:i:s', strtotime($xml->channel->lastBuildDate));
			if ($last_build > $podcast->last_build_date){
				//we got something new
				$this->info('Update podcast: ' . $podcast->title . PHP_EOL);

				foreach ($xml->channel->item as $key => $item) {
					$namespaces = $item->getNameSpaces(true);
					$nodes = $item->children($namespaces['itunes']);

					$new_episode = new Episode;
					$new_episode->podcast_id = $podcast->id;
					$new_episode->title = (string)$item->title;
					$new_episode->description = (string)$item->description;
					$new_episode->mp3_url = (string)$item->enclosure->attributes()->url;
					$new_episode->pub_date = date('Y-m-d H:i:s', strtotime((string)$item->pubDate));
					$new_episode->duration = $nodes->duration;
					$new_episode->save();

					$this->comment('Added episode: ' . $new_episode->title . PHP_EOL);
					$podcast->last_build_date = $last_build;
					$podcast->save();
				}
			}
 			
		}
	}
}