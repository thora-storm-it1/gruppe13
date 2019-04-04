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
	$url = "vare.php?vare_id=$vare_id";
	include "include/meny.php";


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
				<div class='filler'> </div>
				<div class='innpakning'>
					<div class='kolonne'>
						<div class='varenavn'>
							<h1> $varenavn </h1>
						</div>
						<div class='bilde'>
							<img src='$bildeurl'>
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
							We have given this item a rating of $rating/10
						</div>
						<div class='kjøp'>
							<a href='bestilling.php?darkmode=$darkmode'> Request item </a>
						</div>
					</div>
					<div class='kommentarfelt'>";
				}	
				include "include/kommentarfelt.php";
	?>
					</div>
				</div>

</body>

<head>
	<title> <?php echo "$varenavn" ?> </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark/vare.css">
</head>



</html>