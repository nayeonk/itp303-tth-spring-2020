<?php

var_dump($_POST);
// The code in this file will actually add the new song to the database.

// Check that all required fields have been filled out in the previous form 
if ( !isset($_POST['track_name']) || 
	empty($_POST['track_name']) || 
	!isset($_POST['media_type']) || 
	empty($_POST['media_type']) || 
	!isset($_POST['genre']) || 
	empty($_POST['genre']) || 
	!isset($_POST['milliseconds']) || 
	empty($_POST['milliseconds']) || 
	!isset($_POST['price']) || 
	empty($_POST['price']) ) {

	$error = "Please fill out all required fields";
}
else {
	$host = "303.itpwebdev.com";
	$user = "nayeon_db_user";
	$password = "uscItp2020";
	$db = "nayeon_song_db";

	$mysqli = new mysqli($host, $user, $password, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	// Handle optional fields like composer
	if( isset($_POST["composer"]) && !empty($_POST["composer"])) {
		$composer = "'" . $_POST["composer"] . "'";
	}
	else {
		$composer = "null";
	}

	// real_escape_string escapes special characters like single quote, double quote, etc
	$track_name = $mysqli->real_escape_string($_POST["track_name"]);


	// Write SQL to insert this record into the DB
	$sql = "INSERT INTO tracks (name, media_type_id, genre_id, milliseconds, unit_price, composer) 
		VALUES('" . $track_name . "'," 
		. $_POST["media_type"] 
		. ", "
		. $_POST["genre"]
		. ", "
		. $_POST["milliseconds"]
		. ", "
		. $_POST["price"]
		. ", "
		.  $composer . ");";

	echo "<hr>" . $sql . "<hr>";

	// Submit the query
	$results = $mysqli->query($sql);
	if(!$results) {
		echo $mysqli->error;
		exit();
	}

	// affected_rows returns the number of rows inserted, udpated, or deleted by the sql command

	echo "Inserted: " . $mysqli->affected_rows;

	// Knowing the above info, can display a success message
	if($mysqli->affected_rows == 1) {
		$isInserted = true;
	}


	$mysqli->close();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="add_form.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a Song</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">
		<?php if( isset($error) && !empty($error) ) :?>
				<div class="text-danger">
					<?php echo $error; ?>
				</div>
		<?php endif;?>

		<?php if($isInserted) : ?>

				<div class="text-success">
					<span class="font-italic"><?php echo $_POST["track_name"]?></span> was successfully added.
				</div>

		<?php endif;?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add_form.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>