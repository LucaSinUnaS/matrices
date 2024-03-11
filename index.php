<?php 	

require ('functions.php');

$columns = 4;
$rows = 5;
$matriz = [[]];

$matrizBien[0][0] = 0;
$matrizBien[0][1] = 0;
$matrizBien[0][2] = 1;
$matrizBien[0][3] = 0;
$matrizBien[0][4] = 0;
$matrizBien[0][5] = 0;

$matrizBien[1][0] = 0;
$matrizBien[1][1] = 0;
$matrizBien[1][2] = 0;
$matrizBien[1][3] = 1;
$matrizBien[1][4] = 2;
$matrizBien[1][5] = 0;

$matrizBien[2][0] = 0;
$matrizBien[2][1] = 0;
$matrizBien[2][2] = 0;
$matrizBien[2][3] = 0;
$matrizBien[2][4] = 0;
$matrizBien[2][5] = 1;

$matrizRandom[0][0] = 2;
$matrizRandom[0][1] = 1;
$matrizRandom[0][2] = 0;
$matrizRandom[0][3] = 1;
$matrizRandom[0][4] = 6;

$matrizRandom[1][0] = 0;
$matrizRandom[1][1] = 0;
$matrizRandom[1][2] = 1;
$matrizRandom[1][3] = -2;
$matrizRandom[1][4] = -3;

$matrizRandom[2][0] = 0;
$matrizRandom[2][1] = 1;
$matrizRandom[2][2] = 2;
$matrizRandom[2][3] = -1;
$matrizRandom[2][4] = -2;

$matrizRandom[3][0] = -2;
$matrizRandom[3][1] = 2;
$matrizRandom[3][2] = 1;
$matrizRandom[3][3] = 3;
$matrizRandom[3][4] = 0;

for ($i=0; $i < $columns; $i++) { 
	for ($j=1; $j <= $rows; $j++) { 
		$matriz[$i][$j-1]  = ($i*$rows)+$j;
	}
}

$check = checkOrderedAndReduced($matriz, $columns, $rows);
if($check != true){
	printMatriz($matrizRandom,$columns,$rows);
	$matrizOrdenada = orderMatriz($matrizRandom, $columns, $rows);
	printMatriz($matrizOrdenada,$columns,$rows);
}
// var_dump($check);
// for ($i=0; $i < $columns; $i++) { 
//  	for ($j=1; $j <= $rows; $j++) { 
//  		echo($matriz[$i][$j-1]." ");
//  	}
//  	echo("<br>");
// }


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="includes/css/index_style.css">
	<title>Calculadora de matrices</title>
</head>
<body>
<form novalidate autocomplete="off" method="post" enctype="multipart/form-data">
	<div>
		<h2>Tamaño de matriz</h2>
		<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="live_Columns" value="4">
		<span>x</span>
		<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="live_Rows" value="4">		
	</div>

	<div id = "matrixDiv">
		<div id="column1">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C1row1" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C1row2" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C1row3" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C1row4" value="0">
		</div>

		<div id="column2">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C2row1" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C2row2" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C2row3" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C2row4" value="0">
		</div>

		<div id="column3">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C3row1" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C3row2" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C3row3" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C3row4" value="0">
		</div>

		<div id="column4">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C4row1" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C4row2" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C4row3" value="0">
			<input type="text" name="variableOne" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" pattern="[0-9]*" class="sizeInputs" id="C4row4" value="0">
		</div>
	</div>

</form>
</body>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function() {
		var matrixParent = document.getElementById("matrixDiv");
    document.getElementById("live_Columns").addEventListener("keyup", function (e) {
  		var inputColumns = e.target.value; // Get the text typed by user
  		rowsNumber = document.getElementById("column1").childElementCount;
  		//console.log(inputText);
  		//alert(inputText); // log the input text out
  		if(inputColumns && inputColumns > 0){
  			var columnsNumber = document.getElementById("matrixDiv").childElementCount;
  			columnsNumber = document.getElementById("matrixDiv").childElementCount;
  			if(inputColumns > columnsNumber){
	  			for (var i = columnsNumber; i < inputColumns; i++) {
	  				newColumn = document.getElementById("column"+columnsNumber).cloneNode(true);
	  				newColumn.id = "column"+(i+1);
	  				for (var j = 1; j <= rowsNumber; j++) {
	  					newColumn.childNodes[j-1].id = "C"+i+1+"row"+j;
	  				}
	  				matrixParent.appendChild(newColumn);
	  			}
  			}
  			else{
  				for (var i = columnsNumber; i > inputColumns; i--) {
  					document.getElementById("column"+i).remove();
  				}
  			}

  		}
	});


	document.getElementById("live_Rows").addEventListener("keyup", function (e) {
  		var inputRows = e.target.value; // Get the text typed by user
  		var rowsNumber = document.getElementById("column1").childElementCount;
  		var matrixChilds = document.getElementById("matrixDiv").childElementCount;
  		//console.log(matrixChilds);
  		//console.log(inputText);
  		//alert(inputText); // log the input text out
  		if(inputRows && inputRows > 0){
  			if(inputRows > rowsNumber){
	  			for (var o = 1; o <= matrixChilds; o++) {
	  				for (var j = rowsNumber; j < inputRows; j++) {
	  					console.log(j);
	  					newRow = document.getElementById("C"+o+"row"+j).cloneNode(true);
	  					newRow.id = "C"+o+"row"+(j+1);
	  					document.getElementById("column"+o).appendChild(newRow);
	  				}
	  			}  				
  			}
  			else{
  				for (var x = 1; x <= matrixChilds; x++) {
  					for (var y = rowsNumber; y > inputRows; y--) {
  						document.getElementById("C"+x+"row"+y).remove();
  					}
  				}
  			}

  		}
	});
});
</script>
</html>