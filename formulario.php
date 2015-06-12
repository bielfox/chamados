<form action="" method="post">
	<input type="hidden" name="id" value='<?php echo $chamado['id']; ?>'>
	<fieldset>
		<legend>Novo Chamado</legend>
		<?php if(isset($erros_validacao['evento']) && $tem_erros) : ?>
			<label for="evento">Evento:
			<span class="erro"><?php echo $erros_validacao['evento'];?></span>
				<input type="text" name="evento" value='<?php echo $chamado['evento']; ?>'>
			</label>
		<?php else : ?>
			<label for="evento">Evento: <input type="text" name="evento" value='<?php echo $chamado['evento']; ?>'></label>
		<?php  endif; ?>
		<label for="local">Local: <input type="text" name="local" value="<?php echo $chamado['local']; ?>"></label>
		<label for="posicao">Posiçao: <input type="text" name="posicao" value="<?php echo $chamado['posicao']; ?>"></label>
		<label for="solitante">Solicitante: <input type="text" name="solicitante" value="<?php echo $chamado['solicitante']; ?>"></label>
		<?php if(isset($erros_validacao['data_inicio']) && $tem_erros) : ?>
			<label for="data_inicio">Data de Inicio:
				<span class="erro"><?php echo $erros_validacao['data_inicio'];?></span>
				<input type="text" name="data_inicio" value='<?php if ($chamado['data_inicio'] != '') {echo $chamado['data_inicio'];} else {echo date('d/m/Y');} ?>'></label>
			</label>
		<?php else : ?>
			<label for="data_inicio">Data de Inicio:<input type="text" name="data_inicio" value='<?php if ($chamado['data_inicio'] != '') {echo $chamado['data_inicio'];} else {echo date('d/m/Y');} ?>'></label>
		<?php  endif; ?>
		<label for="hora_inicio">Hora de Inicio:<input type="text" name="hora_inicio" value='<?php if ($chamado['hora_inicio'] != '') {echo $chamado['hora_inicio'];} else {echo date('H:i');} ?>'></label>
		<lable for="descricao">Descriçao:<textarea name="descricao"><?php echo $chamado['descricao']; ?></textarea></lable>
		<fieldset>
			<legend>Prioridade</legend>
				<label>
					<input type="radio" name="prioridade" value="1" <?php echo ($chamado['prioridade'] == 1) ? 'checked' : '';?> /> Baixa
				</label>
				<label>
					<input type="radio" name="prioridade" value="2" <?php echo ($chamado['prioridade'] == 2) ? 'checked' : ''; 	?> /> Media		
				</label>
				<label>
					<input type="radio" name="prioridade" value="3"<?php echo ($chamado['prioridade'] == 3) ? 'checked' : ''; 	?> /> Alta
				</label>
		</fieldset>
	
		<?php if(isset($erros_validacao['data_final']) && $tem_erros ) : ?>
			<label for="data_inicio">Data da Finalizaçao:
				<span class="erro"><?php echo $erros_validacao['data_final'];?></span>
				<input type="text" name="data_final" value='<?php echo $chamado['data_final'];?>'/>
			</label>
		<?php else : ?>
			<label for="data_final">Data da Finalizaçao:<input type="text" name="data_final" value='<?php echo $chamado['data_final'];?>'/></label>
		<?php  endif; ?>
		
		<label for="hora_final">Hora da Finalizaçao:<input type="text" name="hora_final" value='<?php echo $chamado['hora_final'];?>'/></label>

		<label>
			Concluido:
			<input type="checkbox" name="concluido" value='1' <?php echo ($chamado['concluido'] == 1) ? 'checked' : '';?> />
		</label>
		
	</fieldset>
	<fieldset>
		<label>Deseja receber e-mail de lembrete para tarefa?</label>
		<label><input type="checkbox" name="lembrete" value="1"></label>
	</fieldset>
	<fieldset>
		<label for="enviar"><input type="submit" value='<?php echo ($chamado['id']>0) ? "Atualizar" : "Cadastrar"; ?>'/></label>
	</fieldset>
</form>