<?php

	function Game01($array, $n){
		echo var_dump($array);
		for($i=0;$i<count($array);$i++){
			for($j = 0; $j < count($array); $j++){
				if($i != $j && ($array[$i]+$array[$j]) == $n){
					return array($array[$i],$array[$j]);
				}
			}
		}
		return false;
	}

	$array = [5,2,8,14,0];
	$n = 15;
	echo var_dump(Game01($array,$n));
?>