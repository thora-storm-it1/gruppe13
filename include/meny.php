<html>

<head>
	<title> Prosjekt 2019 </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark/meny.css">
	<?php
		include "darkmode.php";
	?>

</head>


<body>
	
	<div class="top">
		<div class="tittel"> <?php echo "<a href='index.php?darkmode=$darkmode'> "?> Fiber Route 3.0 </a> </div>
		<div class="navigering">
			<?php
				echo"
				<div>
					<div class='lenke'> <a href='oversikt.php?darkmode=$darkmode'> All wares </a> </div>
				</div>

				<div class='dropdown'>
					<div class='lenke'> <a href='#''> More </a> </div>
					<div class='dropdowninnhold'>
						<a href='darkmodetoggle.php?darkmode=$darkmode&url=$url'> Toggle darkmode </a>
						<a href='#''> Special services </a>
					</div>
				</div>"
			?>
		</div>
	</div>


</body>

