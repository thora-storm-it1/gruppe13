<html>

<style>
	table{border-collapse:collapse;}
	td {border:1px solid}
	
</style>

<body>


<! Vareinformasjon ->

	<?php

		include "include/darkmode.php";

		if(isset($_GET["vare_id"])){
			$vare_id = $_GET["vare_id"];
		}
		else{
			die("Du må velge en vare.");
		}
		
		include "include/kobling.php";


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
					<div class='innpakning'>
						<div class='kolonne'>
							<div class='varenavn'>
								<h1> $varenavn </h1>
							</div>
							<div class='bilde'>
								<img src='$bildeurl' width=100%>
							</div>
						</div>
						<div class='kolonne'>
							<div class='beskrivelse'>
								$beskrivelse
							</div>
							<div class='pris'>
								The $varenavn currently goes for $$pris
							</div>
							<div class='rating'>
								We have given the $varenavn a rating of $rating/10
							</div>
							<div class='kjøp'>
								<a href='bestilling.php?darkmode=$darkmode'> Request item </a>
							</div>
						</div>
					</div>";
		
		}


	?>


<h2> Comments </h2>

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

<h3> Leave a comment </h3>

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

			

			if($kobling->query($sql_3)) {
			header("Refresh:0");
			}

			}



		}		
			
	?>
	

	</form>



</body>

<head>
	<title> <?php echo "$varenavn" ?> </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark/vare.css">
</head>



</html>