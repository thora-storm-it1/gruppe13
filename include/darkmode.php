<head>
		<?php		
			if(isset($_GET["darkmode"])){
				$darkmode = $_GET["darkmode"];
			}
		
		if($darkmode == 1){
			echo" <link rel='stylesheet' href='stilark/darkmode.css'>";
		}
	?>
</head>
