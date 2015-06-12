<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calendário</title>
</head>
<?php
 $mes=1;
 $ano=2014;
 if($mes == 1)  {
 $dias=31;
 $nome="Janeiro";
 }
 if($mes == 2)  {
 $dias=28;
 $nome="Fevereiro";
 }
 if($mes == 3)  {
 $dias=31;
 $nome="Março";
 }
 if($mes == 4)  {
 $dias=30;
 $nome="Abril";
 }
 if($mes == 5)  {
 $dias=31;
 $nome="Maio";
 }
 if($mes == 6)  {
 $dias=30;
 $nome="Junho";
 }
 if($mes == 7)  {
 $dias=31;
 $nome="Julho";
 }
 if($mes == 8)  {
 $dias=31;
 $nome="Agosto";
 }
 if($mes == 9)  {
 $dias=30;
 $nome="Setembro";
 }
 if($mes == 10) {
 $dias=31;
 $nome="Outubro";
 }
 if($mes == 11) {
 $dias=30;
 $nome="Novembro";
 }
 if($mes == 12) {
 $dias=31;
 $nome="Dezembro";
 }
?>
<?php
 echo $nome . " de " . $ano;
?>
<table width="210" border="1" cellspacing="1" cellpadding="1">
<tr>
<td width=30><center>D</center></td>
<td width=30><center>S</center></td>
<td width=30><center>T</center></td>
<td width=30><center>Q</center></td>
<td width=30><center>Q</center></td>
<td width=30><center>S</center></td>
<td width=30><center>S</center></td>
</tr>
<?php
 echo "<tr>";
 for($i=1;$i<=$dias;$i++) {
 $diadasemana = date("w",mktime(0,0,0,$mes,$i,$ano));
 echo $diadasemana;
 $cont = 0;
 if($i == 1) {
 while($cont < $diadasemana) {
 echo "<td></td>";
 $cont++;
 }
 }
 echo "<td width=30><center>";
 echo $i;
 echo "</center></td>";
 if($diadasemana == 6) {
 echo "</tr>";
 echo "<tr>";
 }
 }
 echo "</tr>";
 ?>
</table>
<body>
</body>
</html>
