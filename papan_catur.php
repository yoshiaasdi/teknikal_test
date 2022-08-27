<?php

function papan_catur(){

		for ($x=1; $x <=8 ; $x++) { 

			for ($y=1; $y <=4 ; $y++) { 
				if ( ($x+$y) % 2==1) {
					
					echo "--";
					/*echo '<br>';
					echo "--";
*/
				}elseif (($x+$y) % 2==0) {
					echo "**";
					/*echo '<br>';
					echo "**";*/
				}
			} echo '<br>';
		} 
		
	}

	papan_catur();



  ?>