<html>
<head>
	<title> Wares </title>
	<link rel="stylesheet" href="stilark/oversikt.css">
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


<body>

	<?php
		include "include/kobling.php";
	?>

	<h1> Alle Varer </h1>
		<div class="innpakning">
			<?php
				$sql = "SELECT * FROM kategori JOIN vare ON vare.kategori_id=kategori.kategori_id ORDER BY kategori.kategori_id, varenavn";

				$resultat = $kobling->query($sql);

				echo 
					"<div class='rad'>
						<table>
						<tr>
							<th>Item</th>
							<th>Category</th> 
							<th>Price</th>
							<th>Rating</th>
						</tr>
					</div>";
				while($rad = $resultat->fetch_assoc()){
					$varenavn = $rad["varenavn"];
					$kategorinavn = $rad["kategorinavn"];
					$rating = $rad["rating"];
					$vare_id = $rad["vare_id"];
					$pris = $rad["pris"];
					echo 
						"<div class='rad'>
							<tr>
								<td class='vare'><a href='vare.php?vare_id=$vare_id&darkmode=$darkmode'> $varenavn </a></td> 
								<td>$kategorinavn</td>
								<td>$pris$ </td>
								<td>$rating</td>
							</tr>
						</div>";	
				}
				echo "</table>";
			?>
		</div>
</body>
