<html>
<head>
	<link rel="stylesheet" href="../stilark.css">
	<meta charset="UTF-8">
</head>
<body>

	<?php
		$tjener = "localhost";
		$brukernavn = "root";
		$passord = "";
		$database = "prosjekt2019"; //Denne varierer
	
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);

		if($kobling->connect_error){
			die("Noe gikk galt: " . $kobling->connect_error);
		}
		else {
			echo "Koblingen virker.";
		}

		$kobling->set_charset("utf8");
	?>
	<p>
