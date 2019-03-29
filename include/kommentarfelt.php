<head>
	<link rel="stylesheet" href="stilark/kommentarfelt.css">
</head>

<body>

<h3> Leave a comment </h3>

	<form method="POST">

		<table class="kommenter">
			<tr>
				<td>Brukernavn</td>
				<td><input type="text" name="brukernavn" class="brukernavn"></td>
			</tr>
			<tr>
				<td>Kommentar</td>
				<td><textarea rows="5" cols="80" name="kommentartekst"></textarea></td>
			</tr>
		</table>

		<input type="submit" name="leggtil" value="Comment">



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

<h2> Comments </h2>

	<?php


		$sql = "SELECT * FROM kommentar JOIN bruker ON bruker.bruker_id=kommentar.bruker_id JOIN vare ON vare.vare_id=kommentar.vare_id WHERE kommentar.vare_id=$vare_id";

		$resultat1 = $kobling->query($sql);


		while($rad = $resultat1->fetch_assoc()){

			$brukernavn = $rad["brukernavn"];
			$kommentartekst = $rad["kommentartekst"];
			$tid1 = date_create($rad["tid"]);
			$dato = date_format($tid1, 'd.m.y');
			$tid = date_format($tid1, 'H:i');

			echo "
				<div class=''
					<div class='kommentar'>
						<div class='kommentarinfo'>
							<div> $brukernavn </div>
							<div> Posted $dato at $tid </div> 
						</div> 
						<div class='kommentartekst'> $kommentartekst </div>
					</div><br>";
		}

	?>




</body>