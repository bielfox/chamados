<?php
	session_start();

	include "banco.php";
	include "ajudantes.php";
	$exibir_tabela = false;

	if (isset($_GET['evento']) && $_GET['evento'] != '') {
    	$chamado = array();
	 	
	 	$chamado['id'] = $_GET['id'];

	 	$chamado['evento'] = $_GET['evento'];

	 	if (isset($_GET['local'])){
	 		$chamado['local'] = $_GET['local'];
	 	} else {
	 		$chamado['local'] = '';
	 	}	 	
	 	if (isset($_GET['posicao'])){
	 		$chamado['posicao'] = $_GET['posicao'];
	 	} else {
	 		$chamado['posicao'] = '';
	 	}
	 	if (isset($_GET['solicitante'])){
	 		$chamado['solicitante'] = $_GET['solicitante'];
	 	} else {
	 		$chamado['solicitante'] = '';
	 	}
	 	if (isset($_GET['data_inicio'])){
	 		$chamado['data_inicio'] = $_GET['data_inicio'];
	 	} else {
	 		$chamado['data_inicio'] = '';
	 	}
	 	if (isset($_GET['hora_inicio'])){
	 		$chamado['hora_inicio'] = $_GET['hora_inicio'];
	 	} else {
	 		$chamado['hora_inicio'] = '';
	 	}
	 	if (isset($_GET['descricao'])){
	 		$chamado['descricao'] = $_GET['descricao'];
	 	} else {
	 		$chamado['descricao'] = '';
	 	}
	 	if (isset($_GET['prioridade'])){
	 		$chamado['prioridade'] = $_GET['prioridade'];
	 	} else {
	 		$chamado['prioridade'] = '';
	 	}
	 	if (isset($_GET['data_final'])){
	 		$chamado['data_final'] = $_GET['data_final'];
	 	} else {
	 		$chamado['data_final'] = '';
	 	}
	 	if (isset($_GET['hora_final'])){
	 		$chamado['hora_final'] = $_GET['hora_final'];
	 	} else {
	 		$chamado['hora_final'] = '';
	 	}
	 	if (isset($_GET['concluido'])){
	 		$chamado['concluido'] = $_GET['concluido'];
	 	} else {
	 		$chamado['concluido'] = "1";
	 	}
	 editar_tarefa($conexao, $chamado);
	}
	$chamado = buscar_tarefa($conexao, $_GET['id']);

	include "template.php";