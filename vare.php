<html>

<head>
	<?php
		if(isset($_GET["vare_id"])){
			$vare_id = $_GET["vare_id"];
		}
		else{
			die("Du må velge en vare.");
		}

		include "include/darkmode.php";
	?>




</head>

<style>
	table{border-collapse:collapse;}
	td {border:1px solid}
	
</style>

<body>


<! Vareinformasjon ->

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


		$sql="SELECT * FROM kategori JOIN vare ON vare.kategori_id=kategori.kategori_id WHERE vare_id=$vare_id";
		$resultat = $kobling->query($sql);

		while($rad = $resultat->fetch_assoc()){
				
				$varenavn = $rad["varenavn"];
				$kategorinavn = $rad["kategorinavn"];
				$rating = $rad["rating"];
				$pris = $rad["pris"];
				$bildeurl = $rad["bildeurl"];
				$beskrivelse = $rad["beskrivelse"];


				echo "
						<h1> $varenavn </h1> <br>
						<img src='$bildeurl' width=150px>
						<p> $beskrivelse <p>
						The $varenavn goes for $$pris <br>
						We have given the $varenavn a rating of $rating/10
						";
		
		}


	?>


<h2> Kommentarfelt </h2>

	<?php


		$sql = "SELECT * FROM kommentar JOIN bruker ON bruker.bruker_id=kommentar.bruker_id JOIN vare ON vare.vare_id=kommentar.vare_id WHERE kommentar.vare_id=$vare_id";

		$resultat1 = $kobling->query($sql);

		echo "<table> <tr> <td> Brukernavn </td> <td> Kommentar </td> <td> Publisert </td> </tr>";

		while($rad = $resultat1->fetch_assoc()){

			$brukernavn = $rad["brukernavn"];
			$kommentartekst = $rad["kommentartekst"];
			$tid = $rad["tid"];

			echo "<tr>
					<td>$brukernavn</td>
					<td>$kommentartekst</td>
					<td>$tid</td>
					</tr>";
		}

		echo "</table>";

	


	?>

<h3> Kommenter </h3>

	<form method="POST">
		Brukernavn
		<input type="text" name="brukernavn"> <br>
		Kommentar
		<input type="text" name="kommentartekst"> <br>

		<input type="submit" name="leggtil" value="Kommenter">



	<?php 			

		if(isset($_POST["kommentartekst"])){
			$kobling->set_charset("utf8");
			$brukernavn = $_POST["brukernavn"];
			$kommentartekst = $_POST["kommentartekst"];

			if($brukernavn == ""){
				$brukernavn = "Anonym";
			}

			if($kommentartekst != ""){
							

				$sql_1 = "INSERT INTO bruker (brukernavn) VALUES ('$brukernavn')";
				$sql_2 = "SELECT bruker_id FROM bruker WHERE bruker.brukernavn='$brukernavn'";

				$kobling->query($sql_1);

				$resultat2 = $kobling->query($sql_2);			

				$rad1 = $resultat2->fetch_assoc();

				$bruker_id = $rad1["bruker_id"];

				$sql_3 = "INSERT INTO kommentar (kommentartekst, kommentar.vare_id, kommentar.bruker_id) VALUES ('$kommentartekst', '$vare_id', '$bruker_id')";
			
				$kobling->query($sql_3);

				header("Refresh:0");
			}

			else{
				echo "<p style='color:red;'> Skriv inn en kommentar </p>";
		}
		}		
			
	?>
	

	</form>



</body>

<head>
	<?php
		echo "<title> '$varenavn' </title>";
		echo "<meta charset='UTF-8'>";
	?>


</head>

</html>