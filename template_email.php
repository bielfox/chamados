<h1>Chamado</h1>

<p>
<strong>Evento:</strong>
<?php echo $chamado['evento']; ?>
</p>
<p>
<strong>Concluída:</strong>
<?php echo traduzConcluido($chamado['concluido']); ?>
</p>
<p>
<strong>Local:</strong>
<?php echo $chamado['local']; ?>
</p>
<p>
<strong>Posição:</strong>
<?php echo $chamado['local']; ?>
</p>
<p>
<strong>Data do chamado:</strong>
<?php echo exibeData($chamado['data_inicio'])." ".$chamado['hora_inicio']; ?>
</p>
<p>
<strong>Descrição:</strong>
<?php echo nl2br($chamado['descricao']); ?>
</p>
<p>
<strong>Data da Conclusão:</strong>
<?php echo exibeData($chamado['data_final'])." ".$chamado['hora_final']; ?>
</p>
<p>
<strong>Prioridade:</strong>
<?php echo traduzPrioridade($chamado['prioridade']); ?>
</p>
<?php if (count($anexos) > 0) : ?>
<p><strong>Atenção!</strong> Esta chamado contém anexos!</p>
<?php endif; ?>