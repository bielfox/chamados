<?php
error_reporting(E_ALL);

if (isset($_GET["numero"])){
	$numero = $_GET["numero"];
} 


function contaDez($numero){
	if (isset($numero)){
		for ($i=0; $i < 11 ; $i++){
			echo $numero+$i."<br>";
		}
	}
}

?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<title></title>
	</head>
	<body>
		<form method="get" >
			<legend>Adicione um numero</legend>
			<input type="text" name="numero"></br>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($numero)){
				echo "<h4>"."Numero escolhido:"."</h4>";
				contaDez($numero);
				}
		 ?>
	</body>
</html>