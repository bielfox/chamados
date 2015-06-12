<?php
	function verificaHora(){
		$manha = "00:00";
		$tarde = "12:00";
		$noite = "18:00";
		$hora = date('h:i');
		if ($hora >= $manha && $hora < $tarde){
			echo "Bom Dia";
		} elseif($hora >= $tarde && $hora < $noite){
			echo "Boa Tarde";
		} else{
			echo "Boa Noite";
		}
	}
	/*function linha($semana){
		echo "<tr>";
		for ($i=0;$i<=6;$i++){
			if(isset($semana[$i])){
				echo "<td>{$semana[$i]}</td>";
			} else {
				echo "<td></td>";
			}
		}
		echo "</tr>";
	}*/
	/*function calendario(){
		$dia = 1;
		$semana = array();
		while ($dia<=31){
			array_push($semana, $dia);
			if  (count($semana) == 7){
				linha($semana);
				$semana = array();
			}
			$dia++;
		}
	linha($semana);
	}*/
	function calendario(){
		$ano = date('Y');
		$meses = array('janeiro','fevereiro','março',
					'abril','maio','junho','julho',
					'agosto','setembro','outubro',
					'novembro','dezembro');
		print_r($meses);
		echo "<hr>";
		for ($i=0; $i < 12 ; $i++)  {
			$diasMes[] = cal_days_in_month(CAL_GREGORIAN, $i+1 , $ano);
		}
		$count = count($diasMes);

		for ($i=0; $i < $count ; $i++) { 
			echo "<table border='1'>";
			echo "<tr>";
			echo "<th colspan='7'>".$meses[$i]."</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Dom</th>";
			echo "<th>Seg</th>";
			echo "<th>Ter</th>";
			echo "<th>Qua</th>";
			echo "<th>Qui</th>";
			echo "<th>Sex</th>";
			echo "<th>Sab</th>";
			echo "</tr>";

			$mes = $i+1;

			for ($j=1; $j <= $diasMes[$i] ; $j++) { 
				$diaSemana = date('w',mktime(0,0,0,$mes,$j,$ano));
				$verificaHoje = date('m/d/Y',mktime(0,0,0,$mes,$j,$ano));
				$verificaData = date('m/d/Y');
				$x=1;
 				
 				if ($verificaData == $verificaHoje){
					$marcacao = "hoje";
				} else {
					$marcacao = "";
				}
				if ( $diaSemana == 6 || $diaSemana == 0 ){
					$marcacao2 = "finalsemana";
				} else {
					$marcacao2 = "";
				}
				if ($j==1){
					while ($x <= $diaSemana ) {
						echo "<td></td>";
						$x++;
					}
				}
				echo "<td class={$marcacao} {$marcacao2}>".$j."</td>";
				if ($diaSemana == 6 ) {
				echo "</tr>";
				}
			}
			echo "<hr>";
			}
		echo "</table>";
		}
	function contaSabado(){
		$diaSemana = date('w');
		$restaSabado = 6 - $diaSemana;
		if ($restaSabado > 1){
			echo "Faltam ".$restaSabado." para o Sabado";
		} elseif ($restaSabado == 0) {
			echo "Hoje eh Sabado";
		}
		else {
			echo "Falta ".$restaSabado." para o Sabado";
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
	<style>
		.finalsemana{color: orange;}
		.hoje{color: red ;}
	</style>
	<body>
		
		<h1><?php verificaHora();?></h1>
		
		<p>Hoje eh dia: <?php echo date(' D - d . M . Y');?> - <?php echo date('H:i');?> </p>

		<p><?php contaSabado(); ?> </p>

			<?php calendario();?>
	</body>
</html>