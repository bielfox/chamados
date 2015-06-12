<?php

	include "config.php";
	include "banco.php";
	include "ajudantes.php";

	$exibir_tabela = false;
	$tem_erros = false;
	$erros_validacao = array();

	if (isset($_POST['evento']) && $_POST['evento'] != '') {
    
    	$chamado = array();
	 	
	 	$chamado['id'] = $_POST['id'];

	 	$chamado['evento'] = $_POST['evento'];

	 	if (isset($_POST['local'])){
	 		$chamado['local'] = $_POST['local'];
	 	} else {
	 		$chamado['local'] = '';
	 	}	 	
	 	if (isset($_POST['posicao'])){
	 		$chamado['posicao'] = $_POST['posicao'];
	 	} else {
	 		$chamado['posicao'] = '';
	 	}
	 	if (isset($_POST['solicitante'])){
	 		$chamado['solicitante'] = $_POST['solicitante'];
	 	} else {
	 		$chamado['solicitante'] = '';
	 	}
	 	if (isset($_POST['data_inicio'])){
	 		$chamado['data_inicio'] = $_POST['data_inicio'];
	 	} else {
	 		$chamado['data_inicio'] = '';
	 	}
	 	if (isset($_POST['hora_inicio'])){
	 		$chamado['hora_inicio'] = $_POST['hora_inicio'];
	 	} else {
	 		$chamado['hora_inicio'] = '';
	 	}
	 	if (isset($_POST['descricao'])){
	 		$chamado['descricao'] = $_POST['descricao'];
	 	} else {
	 		$chamado['descricao'] = '';
	 	}
	 	if (isset($_POST['prioridade'])){
	 		$chamado['prioridade'] = $_POST['prioridade'];
	 	} else {
	 		$chamado['prioridade'] = '';
	 	}
	 	if (isset($_POST['data_final'])){
	 		$chamado['data_final'] = $_POST['data_final'];
	 	} else {
	 		$chamado['data_final'] = '';
	 	}
	 	if (isset($_POST['hora_final'])){
	 		$chamado['hora_final'] = $_POST['hora_final'];
	 	} else {
	 		$chamado['hora_final'] = '';
	 	}
	 	if (isset($_POST['concluido'])){
	 		$chamado['concluido'] = '1';
	 	} else {
	 		$chamado['concluido'] = '0';
	 	}
	 	
	    if (! $tem_erros) {
    	    editar_tarefa($conexao, $chamado);

        if (isset($_POST['lembrete']) && $_POST['lembrete'] == '1') {
            $anexos = buscar_anexos($conexao, $chamado['id']);

            enviar_email($chamado, $anexos);
        }

        header('Location:tarefas.php');
        die();
    	}
	}
	 
	$chamado = buscar_tarefa($conexao, $_GET['id']);

	include "template.php";