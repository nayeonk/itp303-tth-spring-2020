<?php

namespace App\Http\Controllers;

// Import the Genre & Track model
use App\Genre;
use App\Track;

use Illuminate\Http\Request;

class SongController extends Controller
{
	public function searchForm() {
		// This is where controller will start interacting with the database to get genres from the databse

		// To interact with the genes table, create an instance of Genre
		$genre = new Genre();

		// Typically at this point we would need to run a SELECT sql query
		// var_dump($genre->all());

		// Pass the $genre info to the view file that will display all the genres in the dropdown
		return view('search_form', [
			'genres' => $genre->all(),
			'username' => 'ttrojan'
		]);
	}

	public function search() {

		// Get the user input using Laravel's helper function called request
		$track_name = request('track_name');
		$genre = request('genre');

		// Create instance of the Track model so we can access the tracks table in DB
		$track = new Track();

		// Query the db using Laravel's Query Builder
		$results = $track->select('tracks.name AS track_name', 'composer', 'genres.name AS genre');

		if( isset($track_name) && !empty($track_name) ) {
			$results = $results->where('tracks.name', 'LIKE' , '%' . $track_name .'%');
		}
		if( isset($genre) && !empty($genre) ) {
			$results = $results->where('tracks.genre_id', '=' , $genre);
		}
		$results = $results->leftJoin('genres', 'tracks.genre_id', '=', 'genres.genre_id');

		// Pass the results to the view, show the view.

		return view('search_results', [
			'tracks' => $results->get()
		]);

	}
}

?>