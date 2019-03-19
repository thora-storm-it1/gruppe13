<html>

<head>
	<title> Prosjekt IT1 2019 </title>
	<meta charset="UTF-8">
</head>


<body style="margin:0">


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

			include "include/darkmode.php";

			echo "</div>";
			
			include "include/meny.php";
			
		?>


	<div class="innhold">
	</div>

</body>



<style>

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



</html>