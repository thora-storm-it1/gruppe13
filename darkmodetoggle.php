<body>

<?php

	if(isset($_GET["darkmode"])){
				$darkmode = $_GET["darkmode"];
				$url = $_GET["url"];
			}
	
	if($darkmode == 1){
		header("Location: $url&darkmode=0");
	}

	else{
		header("Location: $url&darkmode=1");
	}

?>
</body>