<?php
	include "config.php";
	include "banco.php";
	 	remover_tarefa($conexao, $_GET['id']);
	 	$msg="Chamado deletado com sucesso!";
	 	header('Location: tarefas.php?msg='.$msg.'');
	include "template.php";