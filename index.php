<html>

<head>
	<title> Prosjekt 2019 </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark/stilark.css">
</head>


<body>

<div class="navigasjon">
	<div class="navigasjon1"> </div>

	<div class="navigasjon2">
		<div class="top">
			<div class="tittel"> Yeet </div>
			<div class="navigering">
				<?php
					include "meny.php";
				?>
			</div>
		</div>

		<div class="innhold">
		</div>
	</div>



</body>



<style>
	body{
		font-family:Century Gothic;
		margin:0;
	}

	.navigasjon{
		display:flex;
		flex-flow:row wrap;
		position:fixed;
		height:30%;
		width:100%;
	}

	.navigasjon1{
		width:100%;
		background-color:#2D3AB4;
	}

	.navigasjon2{
		width:100%;
		background-color:#F51717;
	}


</style>



</html>