<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	// For each table used, create a model file in Laravel

	// "Map" this model file to the table in the database
	protected $table = 'genres';
	protected $primaryKey = 'genre_id';
}

?>