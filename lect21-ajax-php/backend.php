<?php
	$php_array = [
		"first_name" => "Tommy",
		"last_name" => "Trojan",
		"age" => 21,
		"phone" => [
			"cell" => "123-123-1234",

			"home" => "456-456-4567"
		],
	];

	// Convert assoc array into a JSON formatted string
	// echo json_encode($php_array);

	// Can grab parameters passed from frontend using the $_GET or $_POST superglobal
	echo $_POST["lastName"];

	$host = "303.itpwebdev.com";
	$user = "nayeon_db_user";
	$pass = "uscItp2020";
	$db = "nayeon_song_db";

	$mysqli = new mysqli($host, $user, $pass, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	$sql = "SELECT * FROM tracks WHERE name LIKE '%" . $_GET["term"] ."%' LIMIT 10";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	// Get all the results and put them in an associative array.
	// Send this assoc. array to frontend
	$results_array = [];

	while($row = $results->fetch_assoc()) {
		array_push($results_array, $row);
	}

	echo json_encode($results_array);

?>







