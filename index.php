<html>
<head>
	<title> Vareoversikt </title>
</head>

<body style="font-family:Verdana;">

<?php

include "meny.php"

$tjener = "localhost";
$brukernavn = "root";
$passord = "";
$database = "prosjekt2019";

$kobling = new mysqli($tjener, $brukernavn, $passord, $database);


if ($kobling->connect_error) {
	die("Noe gikk galt: " . $kobling->connect_error);
}

$kobling->set_charset("utf8");

?>

<h1> Alle Varer </h1>

<?php
	$sql = "SELECT * FROM kategori JOIN vare ON vare.kategori_id=kategori.kategori_id ORDER BY kategori.kategori_id, varenavn";

	$resultat = $kobling->query($sql);

	echo "<table>
			<tr>
				<td>Kategori</td>
				<td>Vare</td> 
				<td>Pris</td>
				<td>Rating</td>
				<td class='varebilde'> </td>
			</tr>";

	while($rad = $resultat->fetch_assoc()){
		$kategorinavn = $rad["kategorinavn"];
		$varenavn = $rad["varenavn"];
		$rating = $rad["rating"];
		$vare_id = $rad["vare_id"];
		$pris = $rad["pris"];
		$bildeurl = $rad["bildeurl"];



		echo "
			<tr>
				<td>$kategorinavn</td>
				<td><a href='vare.php?vare_id=$vare_id'> $varenavn </a></td> 
				<td>$pris$ </td>
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