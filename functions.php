<?php 
function printMatriz($matriz, $columns, $rows){
	for ($x=0; $x < $columns; $x++) { 
		for ($y=0; $y < $rows; $y++) { 
			echo($matriz[$x][$y]." ");
		}
		echo("<br>");
	}
	echo("<br>");
}

function checkOrderedAndReduced($matriz, $columns, $rows){
	//Encontrar el indice de la primer fila con un 1, donde comenzaran los escalones
	$firstRow = 0;
	for ($i=0; $i < $rows; $i++) { 
		if($matriz[0][$i] == 1){
			$firstRow = $i;
			break;
		}
	}

	for($i = 1; $i < $columns; $i++){
		for($j = 0; $j < $rows; $j++){
			if($matriz[$i][$j] == 1){
				if($j <= $firstRow){
					return false;
				}
				$firstRow = $j;
				break;
			}
			else if($matriz[$i][$j] !=0){
				return false;
			}
		}
	}
	return true;
}

function orderMatriz($matriz, $columns, $rows){
	$checkOrdered = false;
	$firstRow = -1;
	// for ($i=0; $i < $rows; $i++) { 
	// 	if($matriz[0][$i] != 0){
	// 		$firstRow = $i;
	// 		break;
	// 	}
	// }
	//while($checkOrdered == false){
	for ($m=0; $m < $columns; $m++) {
		//Agarrar primer valor distinto de 0 y que sea mayor al anterior indice para hacer por escalera
		for ($l=0; $l < $rows; $l++) { 
			if($matriz[$m][$l] != 0 && $l > $firstRow){
				$firstRow = $l;
				break;
			}
		}

		//for ($i=0; $i <= $firstRow; $i++) {
			for($j=$m+1;$j<$columns;$j++){
				if($matriz[$j][$firstRow] != 0 && $j>$m){
					if($matriz[$m][$firstRow] != 0){
						$multiplier = -$matriz[$j][$firstRow]/$matriz[$m][$firstRow];
					}
					else{
						$multiplier = 1;
					}
					for($k=0;$k<$rows;$k++){
						
						$matriz[$j][$k] += ($matriz[$m][$k]*$multiplier);
						//printMatriz($matriz,$columns,$rows);
					}
				}
			}
		//}
	}
	$firstRow = -1;

	for ($m=$columns-1; $m > 0; $m--) {
		//Agarrar primer valor distinto de 0 y que sea mayor al anterior indice para hacer por escalera
		for ($l=0; $l < $rows; $l++) { 
			if($matriz[$m][$l] != 0){
				$firstRow = $l;
				break;
			}
		}

		//for ($i=0; $i <= $firstRow; $i++) {
			for($j=0;$j<$columns;$j++){
				if($matriz[$j][$firstRow] != 0 && $j < $m){
					if($matriz[$m][$firstRow] != 0){
						$multiplier = -$matriz[$j][$firstRow]/$matriz[$m][$firstRow];
					}
					else{
						$multiplier = 1;
					}
					for($k=0;$k<$rows;$k++){
						
						$matriz[$j][$k] += ($matriz[$m][$k]*$multiplier);
						//printMatriz($matriz,$columns,$rows);
					}
				}
			}
		//}
	}

	$reducedMatriz = reduceMatriz($matriz, $columns, $rows);
	$sortedMatriz = sortMatriz($reducedMatriz, $columns, $rows);
	$check = checkOrderedAndReduced($sortedMatriz,$columns,$rows);
	return $sortedMatriz;		
		//$checkOrdered = checkOrderedAndReduced($matriz, $columns, $rows);
	//}
}

function reduceMatriz($matriz, $columns, $rows){
	$firstRow = -1;
	for ($i=0; $i < $columns; $i++) { 
		for ($l=0; $l < $rows; $l++) { 
			if($matriz[$i][$l] != 0 && $l > $firstRow){
				$firstRow = $l;
				break;
			}
		}

		$divider = $matriz[$i][$firstRow];
		for ($j=0; $j < $rows; $j++) { 
			$matriz[$i][$j] /= $divider;
		}
	}
	//printMatriz($matriz,$columns,$rows);

	return $matriz;
}

function sortMatriz($matriz, $columns, $rows){
	$firstRows = [];
	$firstColumns = [];
	$count = 0;
	while($count != $columns){
		$count = 0;
		for ($i=0; $i < $columns; $i++) { 
			for ($l=0; $l < $rows; $l++) { 
				if($matriz[$i][$l] != 0){
					$firstRows[$i] = $l;
					$firstColumns[$i] = $i;
					break;
				}
			}
		}
		for ($i=0; $i < count($firstRows); $i++) { 
			for ($j=$i+1; $j < count($firstRows); $j++) { 
				if($firstRows[$i] > $firstRows[$j]){
					$auxRow = $firstRows[$j];
					$firstRows[$j] = $firstRows[$i];
					$firstRows[$i] = $auxRow;
					for ($m=0; $m < $rows; $m++) { 
						$aux = $matriz[$i][$m];
						$matriz[$i][$m] = $matriz[$j][$m];
						$matriz[$j][$m] = $aux;
					}
				}
				else{
					$count ++;
				}
			}
		}		
	}
	//printMatriz($matriz,$columns,$rows);
	//print_r($firstRows);
	return $matriz;
}

?>