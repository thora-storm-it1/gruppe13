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

	<h3> Black marked wares for all your needs: </h3>

	

	<div class="preview">
		<div class="topsellers"><h2 width="100%"> You might also like </h2></div>
		<?php
			$sql = "SELECT * FROM vare ORDER BY RAND() LIMIT 3";
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