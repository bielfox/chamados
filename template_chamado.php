<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gerenciador de Chamados</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
	<h1>Gerenciador de Chamados</h1>

	<h2><?php echo $chamado['evento']; ?></h2>
	<p>Local: <?php echo $chamado['local']; ?></p>
	<p>posicao: <?php echo $chamado['posicao']; ?></p>
	<p>Solicitante: <?php echo $chamado['solicitante']; ?></p>
	<p>Data do chamado:<?php echo $chamado['hora_inicio']." ".exibeData($chamado['data_inicio']); ?></p>
	<p>Descrição: <?php echo nl2br($chamado['descricao']); ?></p>
	<p>Prioridade: <?php echo traduzPrioridade($chamado['prioridade']); ?></p>
	<p>Data da Conclusão do chamado: <?php echo $chamado['hora_final']." ".exibeData($chamado['data_final']); ?></p>
	<p>Status do Chamado: <?php echo traduzConcluido($chamado['concluido']); ?></p>
	
	<?php if (count($anexos)>0): ?>
		
		<h2>Anexos</h2>
		
		<table>
			<tr>
				<th>Nome</th>
				<th>Baixar</th>
			</tr>
			<?php foreach ($anexos as $anexo) :?>
			<tr>
				<td><?php echo $anexo['nome'];?></td>
				<td><a href=anexos/<?php echo $anexo['nome']; ?>>Download</a>|<a href=remover_anexo.php?id=<?php echo $anexo['id']; ?>&id_pagina=<?php echo $_GET['id']; ?>>Remover</a></td>

			<?php endforeach; ?>	
		</table>
	<?php else:?>

		<p>Não há anexos</p>

	<?php endif; ?>
	<h2>Novo Anexo	</h2>
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Novo Anexo</legend>
			<input type="hidden" name="id_chamado" value='<?php echo $chamado['id']?>'>
				<label for="">
					<?php if ($tem_erros && isset($erros_validacao['anexo'])):?>
						<span class="erro">
							<?php echo $erros_validacao['anexo'];?>
						</span>
					<?php endif; ?>
					<input type="file" name="anexo">
				</label>
			<input type="submit" value="Cadastrar">
		</fieldset>
	</form>

	

</body>
</html>