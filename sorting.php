<?php
	
	function urut(){

		

		$angka = array(2,77,3,5,66,79,567,344,666);
		$nomor = sort($angka);
	
		echo "(";
		foreach ($angka as $number ) {


			$sorting = print$number;
			echo ",";
		}	
		echo ")";

	}

	urut();
	
  ?>