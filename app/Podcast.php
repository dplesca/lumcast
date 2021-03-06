<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model {
	protected $fillable = ['title', 'description', 'url', 'image', 'active'];

	public function episodes()
    {
        return $this->hasMany('App\Episode');
    }
}