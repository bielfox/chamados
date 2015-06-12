	<table border="1">
			<tr>
				<th colspan="10">Lista de Chamados</th>
			</tr>
			<tr>
				<th>Evento</th>
				<th>Local</th>
				<th>Posicao</th>
				<th>Solicitante</th>
				<th>Inicio</th>
				<th>Descriçao</th>
				<th>Prioridade</th>
				<th>Finalizaçao</th>
				<th>Concluido</th>
				<th>Editar</th>
			</tr>
		<?php foreach ($lista_chamados as $chamado) : ?>
			<tr>
				<td><a href='tarefa.php?id=<?php echo $chamado['id']; ?>'><?php echo $chamado['evento']; ?></a></td>
				<td><?php echo $chamado['local']; ?></td>
				<td><?php echo $chamado['posicao']; ?></td>
				<td><?php echo $chamado['solicitante']; ?></td>
				<td><?php echo $chamado['hora_inicio']." ".exibeData($chamado['data_inicio']); ?></td>
				<td><?php echo $chamado['descricao']; ?></td>
				<td><?php echo traduzPrioridade($chamado['prioridade']); ?></td>
				<td><?php echo $chamado['hora_final']." ".exibeData($chamado['data_final']); ?></td>
				<td><?php echo traduzConcluido($chamado['concluido']); ?></td>
				<td><a href=editar.php?id=<?php echo $chamado['id']; ?>>Editar</a> | <a href=remover.php?id=<?php echo $chamado['id']; ?>>Remover</a></td>
				
			</tr>
		<?php endforeach; ?>
	</table>
