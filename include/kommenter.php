
<body>
	<?php 			

		if(isset($_GET["vare_id"])){
		$vare_id = $_GET["vare_id"];
	}
	else{
		die("Du må velge en vare.");
	}
	
	$tjener = "localhost";
	$brukernavn = "root";
	$passord = "";
	$database = "prosjekt2019";

	$kobling = new mysqli($tjener, $brukernavn, $passord, $database);


	if ($kobling->connect_error) {
		die("Noe gikk galt: " . $kobling->connect_error);
	}


	while($rad = $resultat->fetch_assoc()){
			
			$brukernavn = $rad["brukernavn"];
			$kommentartekst = $rad["kommentartekst"];
			$rating = $rad["rating"];
			$pris = $rad["pris"];
			$bildeurl = $rad["bildeurl"];
			$beskrivelse = $rad["beskrivelse"];
	}

	$kobling->set_charset("utf8");

				$brukernavn = $_POST["brukernavn"];
				$kommentartekst = $_POST["kommentartekst"];

				if($brukernavn == ""){
					$brukernavn = "Anonym";
				}

				/*if($kommentartekst == ""){
					die("<p style='color:red'>Kan ikke legge ut en blank kommentar");
				} */


					$sql_1 = "INSERT INTO bruker (brukernavn) VALUES ('$brukernavn')";
					$sql_2 = "SELECT bruker_id FROM bruker WHERE bruker.brukernavn=$brukernavn";

					$resultat2 = $kobling2->query($sql_2);

					echo "$resultat2";

					
				$resultat2 = $kobling2->query($sql_2);

				if($resultat1 == ""){
					die("Ingen resultat");
				}

				while($rad1 = $resultat2->fetch_assoc()){

					echo "$bruker_id";

					$sql_3 = "INSERT INTO kommentar (kommentartekst, kommentar.vare_id, kommentar.bruker_id) VALUES ('$kommentartekst', '$vare_id', '$bruker_id')";


					if($kobling->query($sql_1)) {

					echo "<br> Spørringen brukernavn ble gjennomført. <br>";
					}

					else {
					echo "Noe gikk galt med spørringen brukernavn ($kobling->error). <br>";
					}

					if($kobling->query($sql_3)) {

					echo "Spørringen kommentartekst ble gjennomført. <br>";
					}

					else {
						echo "Noe gikk galt med spørringen kommentartekst ($kobling->error). <br>";
						}

				}
			

		?>
		

		</form>
<body>