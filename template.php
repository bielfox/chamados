<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gerenciador de Chamados</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
	<h1>Gerenciador de Chamados</h1>

	<?php include('formulario.php'); ?>
	
	<?php if($exibir_tabela): ?>
		<?php include('tabela.php'); ?>
	<?php endif; ?>

</body>
</html>