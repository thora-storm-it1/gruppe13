<html>
<head>
	<title> Koble til database fra PHP </title>
</head>

<body style="font-family:Verdana;">

<?php

$tjener = "localhost";
$brukernavn = "root";
$passord = "";
$database = "tegneserie";

$kobling = new mysqli($tjener, $brukernavn, $passord, $database);


if ($kobling->connect_error) {
	die("Noe gikk galt: " . $kobling->connect_error);
} else {
	echo "Koblingen virker.";
}

$kobling->set_charset("utf8");

?>

<h1> Blader </h1>

<?php
	$sql = "SELECT * FROM kategori JOIN subkategori ON kategori.kategori_id=subkategori.kategori_id JOIN vare ON vare.subkategori_id=subkategori.subkategori_id ORDER BY kategori_id";
	$resultat = $kobling->query($sql);

	echo "<table> <tr>
				<td>Kategori</td>
				<td>Subkategori</td> 
				<td>Vare</td> 
				<td>Rating</td>  
			  </tr>";

	while($rad = $resultat->fetch_assoc()){
		$kategorinavn = $rad["kategorinavn"];
		$subkategorinavn = $rad["subkategorinavn"];
		$varenavn = $rad["varenavn"];
		$rating = $rad["rating"];


		echo "<tr>
				<td>$kategorinavn</td>
				<td> $subkategorinavn </td> 
				<td>$<a href='vare.php?vare_id=$vare_id'> $varenavn </a></td> 
				<td>$rating</td>  
			  </tr>";
	}

	echo "</table>";

		


?>

</body>


<style>
	table{border-collapse:collapse;}
	td {border:1px solid}
</style>

</html>