<html>
<head>
	<title> Vareoversikt </title>
	<?php
		$url = "oversikt.php";
		include "include/darkmode.php";
		include "include/meny.php";

		if(isset($_GET["darkmode"])){
				$darkmode = $_GET["darkmode"];
			}
		if($darkmode == 1){
			echo" <link rel='stylesheet' href='stilark/darkmode.css'>";
		}
	?>
</head>


<body style="font-family:Verdana;">

<?php

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
				</tr>";

		while($rad = $resultat->fetch_assoc()){
			$kategorinavn = $rad["kategorinavn"];
			$varenavn = $rad["varenavn"];
			$rating = $rad["rating"];
			$vare_id = $rad["vare_id"];
			$pris = $rad["pris"];
			



			echo "
				<tr>
					<td>$kategorinavn</td>
					<td class='varenavn'><a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'> $varenavn </a></td> 
					<td>$pris$ </td>
					<td>$rating</td>
				</tr>";
				
		}

		echo "</table>";
	?>







</body>


<style>
	table{border-collapse:collapse;}
	td {border:1px solid;}
	.varebilde{display:block;}
	

</style>


