	<div class="tittel"> Yeet </div>
		<div class="navigering">
			<?php

			?>
			<div class="dropdown">
				<button class="dropdownknapp"> <a href="#"> Knapp 1 </a> </button>
				<div class="dropdowninnhold">
					<a href="#"> Lenke 1 </a>
					<a href="#"> Lenke 2 </a>
					<a href="#"> Lenke 3 </a>
					<a href="#"> Lenke 4 </a>
				</div>


			</div>
		</div>


<style>
	.dropdown{ display: inline-block; position: relative;}
	.dropdownknapp{ background-color: red; padding: 20px; text-decoration: none; color:black; font-size: 17px;}
	.dropdowninnhold{ display:none; position:absolute; }
	.dropdowninnhold a{  color: black; ; text-decoration: none; display: block; padding:20px; }
	.dropdown:hover .dropdowninnhold{ display:block; background-color:yellow; }
</style>

