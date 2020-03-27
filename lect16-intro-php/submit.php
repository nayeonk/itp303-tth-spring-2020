<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Intro to PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Intro to PHP</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4 mb-3">PHP Output</h2>

<div class="col-12">
<!-- Display Test Output Here -->
<?php
	echo "Hello World2!";
	echo "<strong>Hello World!</strong>";
	echo "<hr>";

	// Variables
	$name = "Tommy";
	$age = 18;

	//echo $name;

	// Error checking using isset() and empty()
	// isset(): does this variable equal to some value??
	// empty(): is this variable an empty string?
	if( isset($name) && !empty($name) ) {
		echo $name;
	}
	else {
		echo "No name";
	}

	echo "<hr>";
	// var_dump() is useful to dump out any variables. It also tells you the data type and value.
	var_dump($age);

	echo "<hr>";
	// Concatenation
	echo "My name is " . $name;
	// With double quotes, you can utilize variable interpolation and do something like this:
	echo "<hr>";
	echo "My name is $name";

	echo "<hr>";
	// Can't do this with single quotes
	echo 'My name is $name';

	// Get current timestamp
	// Set the timezone
	date_default_timezone_set('America/Los_Angeles');

	echo "<hr>";
	// Display the current date/time
	echo date("m-d-y H:i:s T");

	// Arrays and for loops
	$colors = ["red", "blue", "green"];
	echo "<hr>";
	echo $colors[0];
	echo "<hr>";
	for ($i = 0; $i < sizeof($colors); $i++) {
		echo $colors[$i] . ",";
	}

	// Associative arrays - are arrays but use string keys
	$courses = [
		"ITP 303" => "Full-Stack Web Development",
		"ITP 404" => "Advanced Front-End Web Development",
		"ITP 405" => "Advanced Back-End Web Development"
	];
	echo "<hr>";
	echo $courses["ITP 303"];

	echo "<hr>";
	// Iterate through $courses and show all the course information
	foreach( $courses as $courseNumber => $courseName) {
		echo $courseNumber . ": " . $courseName;
		echo "<br>";
	}
	echo "<hr>";
	// More commonly - just show the values and not they keys
	foreach( $courses as $courseName) {
		echo $courseName;
		echo "<br>";
	}
	echo "<hr>";
	// Can only echo out strings
	// echo $courses;
	// Can use var_dump to quickly see what's in the assoc array
	var_dump($courses);


	// SUPER GLOBALS

	// echo "<hr>";
	// var_dump($_SERVER);
	echo "<hr>";
	echo $_SERVER["HTTP_HOST"];

	echo "<hr>";
	echo "POST: ";
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";

	echo "<hr>";
	echo "GET: "; 
	var_dump($_GET);

?>
</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">

			<h2 class="col-12 mt-4">Form Data</h2>

		</div> <!-- .row -->

		<div class="row mt-3">
			<div class="col-3 text-right">Name:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["name"]) && !empty($_POST["name"]) ) {
						echo $_POST["name"];
					}
					else {
						// if you wanted to redirect user back to the form
						// header("Location: form.php");
						echo "<div class='text-danger'>Not provided.</div>";
					}
					
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Email:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					echo $_POST["email"];
				?>
				

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Current Student:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subscribe:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				<?php
					if( isset($_POST["subscribe"]) && !empty($_POST["subscribe"]) ) {
						// For loop to display all checkboxes
						for($i = 0; $i < sizeof($_POST["subscribe"]); $i++) {
							echo $_POST["subscribe"][$i];
						}
						// You could alternatively run a foreach loop
						foreach($_POST["subscribe"] as $subscribe) {
							echo $subscribe;
						}
					}
				?>

			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Subject:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-3 text-right">Message:</div>
			<div class="col-9">
				<!-- Display Form Data Here -->
				
			</div>
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .row -->

	</div> <!-- .container -->
	
</body>
</html>