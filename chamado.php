	<h2><?php echo $chamado['evento']; ?></h2>

	<p>Local: <?php echo $chamado['local']; ?></p>

	<p>posicao: <?php echo $chamado['posicao']; ?></p>

	<p>Solicitante: <?php echo $chamado['solicitante']; ?></p>

	<p>Data do chamado:<?php echo $chamado['hora_inicio']." ".exibeData($chamado['data_inicio']); ?></p>

	<p>Descrição: <?php echo nl2br($chamado['descricao']); ?></p>
	
	<p>Prioridade: <?php echo traduzPrioridade($chamado['prioridade']); ?></p>

	<p>Data da Conclusão do chamado: <?php echo $chamado['hora_final']." ".exibeData($chamado['data_final']); ?></p>

	<p>Status do Chamado: <?php echo traduzConcluido($chamado['concluido']); ?></p>

	<h2>Anexos</h2>
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Novo Anexo</legend>
			<input type="hidden" value='<?php echo $chamado['id']?>'>
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

	<h2>Novo Anexo	</h2>
