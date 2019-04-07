<html>

<head>
	<title> Prosjekt 2019 </title>
	<link rel="stylesheet" href="stilark/index.css">
	<meta charset="UTF-8">
	<?php 
		$url = "index.php?a=1"

	?>

</head>


<body>

<?php
	include "include/kobling.php";
	include "include/darkmode.php";	
	include "include/meny.php";
?>

<div class="filler" style="height:20%;"> </div>

<div class="innhold">

	<h2> <i> Ammu-Nation. Your go-to site for all things self defense, -and offense. </i> </h2>

		

	<div class="preview">
		<div class="overskrift"> <h2> Our top sellers </h2> </div>
		<?php
			$sql0 = "SELECT * FROM vare WHERE vare_id IN ('2','3','4')";
			$resultat0 = $kobling->query($sql0);
				while($rad = $resultat0->fetch_assoc()){
					$bildeurl = $rad["bildeurl"];
					$vare_id = $rad["vare_id"];
				
				echo "
				<a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'><div class='vare'><img src='$bildeurl'></div></a>
				";
			}
		?>
			
	</div>

	<div class="preview">
		<div class="overskrift"><h2> You might also like </h2></div>
		<?php
			$sql = "SELECT * FROM vare WHERE vare_id NOT IN ('2','3','4') ORDER BY RAND() LIMIT 3";
			$resultat = $kobling->query($sql);

			while($rad = $resultat->fetch_assoc()){		
				$varenavn = $rad["varenavn"];
				$bildeurl = $rad["bildeurl"];
				$rating = $rad["rating"];
				$vare_id = $rad["vare_id"];
				$pris = $rad["pris"];

				echo "
					<a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'>	<div class='vare'><img src='$bildeurl'></div></a>";
			}


		?>

	</div>


</div>

</body>

<style>

</html>