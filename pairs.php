<?php


	function pasangan(){

		$array = array(1,3,3,6,1,4,5,5,5,4);
		$new_array = array();

		foreach ($array as $key => $value) {
		    if(isset($new_array[$value]))
		        $new_array[$value] += 1;
		    else
		        $new_array[$value] = 1;
		}

		foreach ($new_array as $angka => $jumlah) {
		    
		    if($jumlah <= 1)
		        echo "($angka)";
		    echo "<br />";
		}

			//print_r(array_count_values($array));


	}

	pasangan();




	

  ?>