<html>

<head>
	<title> Prosjekt 2019 </title>
	<meta charset="UTF-8">

</head>


<body>

	<div style="position:fixed; margin-top:120px;">
			<form method="POST" action=''>
				<input class="darkmode" type="submit" name="darkmode"  value="Dark mode">
				<input class="lightmode" type="submit" name="lightmode"  value="Light mode">
			</form>
		<?php

			if(isset($_POST['darkmode'])){

					$darkmode = 1;
				}
				else{

					$darkmode = 0;
				}

			echo "</div>";
			
			include "include/meny.php";
			
		?>


	<div class="innhold" style="height:50000px;">
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

	<?php
		if(isset($_POST['darkmode'])){
			echo ".darkmode{display:none};";
		}
		else{
			echo".lightmode{display:none;";
		}


	?>
</style>

<head>
	<?php
		if($darkmode == 1){
			echo" <link rel='stylesheet' href='stilark/darkmode.css'>";
		}
	?>
</head>


</html>