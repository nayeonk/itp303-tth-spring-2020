<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
	// "Map this model file to the track table in the db "
	protected $table = 'tracks';
	protected $primaryKey = 'track_id';
}

?>