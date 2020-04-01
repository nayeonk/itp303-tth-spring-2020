<?php

var_dump($_GET);

// ---- STEP 1: Establish DB Connection
$host = "303.itpwebdev.com";
$user = "nayeon_db_user";
$password = "uscItp2020";
$db = "nayeon_song_db";

// Create an instance of the mysqli class
// By simply creating an instance of this class, we are attempting to connect to the database
$mysqli = new mysqli($host, $user, $password, $db);

// Check for errors in database connection
// $mysqli->connect_errno returns the error code (integer)
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	// Terminate the program. No reason to continue. No subsequent code will run.
	exit();
}
// Set a unified character set
$mysqli->set_charset("utf8");

// ---- STEP 2: Generate & Submit SQL Query
// Base statement
$sql = "SELECT tracks.name AS track, genres.name AS genre, media_types.name AS media_type
FROM tracks
JOIN genres
	ON genres.genre_id = tracks.genre_id
JOIN media_types
	ON media_types.media_type_id = tracks.media_type_id
WHERE 1=1";

// If user asks enters in certain fields, append to the base statement
if(isset($_GET["track_name"]) && !empty($_GET["track_name"])) {
	$sql = $sql . " AND tracks.name LIKE '%" . $_GET["track_name"] ."%'";
}
if(isset($_GET["genre"]) && !empty($_GET["genre"])) {
	$sql = $sql . " AND tracks.genre_id = " . $_GET["genre"];
}
if(isset($_GET["media_type"]) && !empty($_GET["media_type"])) {
	$sql = $sql . " AND tracks.media_type_id = " . $_GET["media_type"];
}

$sql = $sql . ";";

echo "<hr>" . $sql . "<hr>";

$results = $mysqli->query($sql);
if(!$results) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<h1 class="col-12 mt-4">Song Search Results</h1>
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="container-fluid">
		<div class="row mb-4 mt-4">
			<div class="col-12">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row">
			<div class="col-12">

				Showing 2 result(s).

			</div> <!-- .col -->
			<div class="col-12">
				<table class="table table-hover table-responsive mt-4">
					<thead>
						<tr>
							<th>Track</th>
							<th>Genre</th>
							<th>Media Type</th>
						</tr>
					</thead>
<tbody>

	<!-- For every result, a new <tr> tag needs to be created -->
	<?php
		while( $i > 0) {
			// code
		}
	?>

	<?php while( $row = $results->fetch_assoc()) :?>

		<tr>
			<td>
				<?php echo $row["track"]; ?>
			</td>
			<td>
				<?php echo $row["genre"]; ?>
			</td>
			<td>
				<?php echo $row["media_type"]; ?>
			</td>
		</tr>

	<?php endif ?>
	<!-- <tr>
		<td>For Those About To Rock (We Salute You)</td>
		<td>Rock</td>
		<td>MPEG audio file</td>
	</tr>

	<tr>
		<td>Put The Finger On You</td>
		<td>Rock</td>
		<td>MPEG audio file</td>
	</tr> -->

</tbody>
				</table>
			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="search_form.php" role="button" class="btn btn-primary">Back to Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</body>
</html>