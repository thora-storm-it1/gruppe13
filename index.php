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

	<h3> Black marked wares for all your needs </h3>

	<div class="preview">
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
					<div class='vare'>
						<div class='varebilde'>
							<a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'><img src='$bildeurl'> </a>
						</div>

						<div class='tekstlenke'>
							<a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'>$varenavn </a>
						</div>
					</div>";
			}


		?>

	</div>


</div>

</body>

<style>

</html>