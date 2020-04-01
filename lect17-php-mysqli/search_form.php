<?php
	
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

// ---- STEP 2: Generate & Submit SQL Query
$sql = "SELECT * FROM genres;";
echo "<hr>" . $sql . "<hr>";

// Submit the SQL query and get a response back
$results = $mysqli->query($sql);

var_dump($results);

// Check for any SQL/result errors when we get the result back. $mysqli->query() will return FALSE if there were any errors with the query
if(!$results) {
	echo $mysqli->error;
	exit();
} 


// ---- STEP 3: Display Results
echo "<hr> Num rows: " . $results->num_rows . "<hr>";

// fetch_assoc() - fetches one result row as an associative array.
// var_dump($results->fetch_assoc());
// echo "<hr>";

// to show ALL results, need to run a whlie loop
// while( $row = $results->fetch_assoc() ) {
// 	var_dump($row["name"]);
// 	echo "<hr>";
// }

// You can't run through results more than once
// while( $row = $results->fetch_assoc() ) {
// 	var_dump($row["name"]);
// 	echo "<hr>";
// }


// ---- STEP 4: Close connection
$mysqli->close();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Song Search Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Song Search Form</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="search_results.php" method="GET">

			<div class="form-group row">
				<label for="name-id" class="col-sm-3 col-form-label text-sm-right">Track Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="name-id" name="track_name">
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
				<div class="col-sm-9">
<select name="genre" id="genre-id" class="form-control">
	<option value="" selected>-- All --</option>

	<?php
		// This works, but gets a bit messy 
		// while( $row = $results->fetch_assoc() ) {
		// 	echo "<option>" . $row["name"] . "</option>";
		// }
	?>

	<!-- Can use Alternative syntax to try to separate PHP and HTML out as much as possible -->

	<?php while( $row = $results->fetch_assoc() ):?>

		<option value="<?php echo $row['genre_id']; ?>"> <?php echo $row["name"] ?></option>

	<?php endwhile; ?>

	<!-- <option value='1'>Rock</option>
	<option value='2'>Jazz</option>
	<option value='3'>Metal</option>
	<option value='4'>Alternative & Punk</option>
	<option value='5'>Rock And Roll</option> -->

</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<label for="media-type-id" class="col-sm-3 col-form-label text-sm-right">Media Type:</label>
				<div class="col-sm-9">
					<select name="media_type" id="media-type-id" class="form-control">
						<option value="" selected>-- All --</option>

						<option value='1'>MPEG audio file</option>
						<option value='2'>Protected AAC audio file</option>

					</select>
				</div>
			</div> <!-- .form-group -->
			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Search</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
	</div> <!-- .container -->
</body>
</html>