<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Podcast;

class PodcastsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('podcasts')->delete();

        $starting_podcasts = [
        	[
        		'title' => 'Invisibilia',
        		'description' => 'Invisibilia (Latin for all the invisible things) is about the invisible forces that control human behavior – ideas, beliefs, assumptions and emotions. Co-hosted by Lulu Miller and Alix Spiegel, Invisibilia interweaves narrative storytelling with scientific research that will ultimately make you see your own life differently.',
        		'image' => 'http://media.npr.org/images/podcasts/primary/icon_510307-b8676d21f76d8a78f9881171c28ae6569f8b795b.jpg?s=1400',
        		'url' => 'http://www.npr.org/rss/podcast.php?id=510307',
        		'active' => 1
        	],
        	[
        		'title' => 'Serial',
        		'description' => "Serial is a new podcast from the creators of This American Life, hosted by Sarah Koenig. Serial unfolds one story - a true story - over the course of a whole season. The show follows the plot and characters wherever they lead, through many surprising twists and turns. Sarah won't know what happens at the end of the story until she gets there, not long before you get there with her. Each week she'll bring you the latest chapter, so it's important to listen in, starting with Episode 1. New episodes are released on Thursday mornings. Serial, like This American Life, is a production of WBEZ Chicago.",
        		'image' => 'http://serialpodcast.org/sites/all/modules/custom/serial/img/serial-itunes-logo.png',
        		'url' => 'http://feeds.serialpodcast.org/serialpodcast',
        		'active' => 1
        	]
        ];

        foreach ($starting_podcasts as $podcast) {
        	$pod = Podcast::create($podcast);
        }
    }

}