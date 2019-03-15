<html>
<head>
	<title> All wares </title>
</head>

<body style="font-family:Verdana;">

<?php
	include "include/kobling.php";
?>

<h1> All wares </h1>

<?php
	$sql = "SELECT * FROM kategori JOIN vare ON vare.kategori_id=kategori.kategori_id ORDER BY kategori.kategori_id, varenavn";

	$resultat = $kobling->query($sql);

	echo "<table>
			<tr>
				<td>Category</td>
				<td>Item</td> 
				<td>Price</td>
				<td>Rating</td>
				<td class='varebilde'> </td>
			</tr>";

	while($rad = $resultat->fetch_assoc()){
		$kategorinavn = $rad["kategorinavn"];
		$varenavn = $rad["varenavn"];
		$rating = $rad["rating"];
		$vare_id = $rad["vare_id"];
		$pris = $rad["pris"];
		$bildeurl = $rad["bildeurl"];



		echo "
			<tr>
				<td>$kategorinavn</td>
				<td><a href='vare.php?vare_id=$vare_id'> $varenavn </a></td> 
				<td>$pris$ </td>
				<td>$rating</td>
			</tr>"; 
	}

	echo "</table>";

?>







</body>


<style>
	table{border-collapse:collapse;}
	td {border:1px solid}
	
</style>

</html>