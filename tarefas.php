<?php
	include "config.php";
	include "banco.php";
	include "ajudantes.php";
	$exibir_tabela = true;

	$tem_erros = false;
	
	$erros_validacao = array();

	if (temPost()) {
    	$chamado = array();
		if(isset($_POST['evento']) && strlen($_POST['evento']) > 0){
		$chamado['evento'] = $_POST['evento'];
		}else{
			$tem_erros=true;
			$erros_validacao['evento'] = 'O campo evento é Obrigatório';
		}

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
	 	if (isset($_POST['data_inicio']) && strlen($_POST['data_inicio'] > 0)){
	 		if (validarData($_POST['data_inicio'])) {
	 			$chamado['data_inicio'] = dataDb($_POST['data_inicio']);	
	 		} else {
	 			$tem_erros = true;
	 			$erros_validacao['data_inicio'] = 'O formato da data está incorreto';
	 		} 		
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
	 	if (isset($_POST['data_final']) && strlen($_POST['data_final']) > 0 ){
	 		if (validarData($_POST['data_final'])) {
	 			$chamado['data_final'] = dataDb($_POST['data_final']);	
	 		} else {
	 			$tem_erros = true;
	 			$erros_validacao['data_final'] = 'O formato da data está incorreto';
	 		} 		
	 	} else {
	 		$chamado['data_final'] = '';
	 	}
	 	if (isset($_POST['hora_final'])){
	 		$chamado['hora_final'] = $_POST['hora_final'];
	 	} else {
	 		$chamado['hora_final'] = '';
	 	}
	 	if (isset($_POST['concluido'])){
	 		$chamado['concluido'] = $_POST['concluido'];
	 	} else {
	 		$chamado['concluido'] = "1";
	 	}
	 	if (! $tem_erros) {
	 		gravar_chamado($conexao, $chamado);

	 		if (isset($_POST['lembrete']) && $_POST['lembrete']=='1'){
	 			enviar_email($chamado);
	 		}
	 		header('Location: tarefas.php');
	 		die();
		}
	
	}		
	$lista_chamados = buscar_chamados($conexao);
	$chamado = array(
		'id' 			=> 0,
		'evento'		=>(isset($_POST['evento'])) ? $_POST['evento'] : '',
		'local'			=>(isset($_POST['local'])) ? $_POST['local'] : '',
		'posicao'		=>(isset($_POST['posicao'])) ? $_POST['posicao'] : '',
		'solicitante'	=>(isset($_POST['solicitante'])) ? $_POST['solicitante'] : '',
		'data_inicio'	=>(isset($_POST['data_inicio'])) ? $_POST['data_inicio'] : '',
		'hora_inicio'	=>(isset($_POST['hora_inicio'])) ? $_POST['hora_inicio'] : '',
		'descricao'		=>(isset($_POST['descricao'])) ? $_POST['descricao'] : '',
		'prioridade'	=>(isset($_POST['prioridade'])) ? $_POST['prioridade'] : '',
		'data_final'	=>(isset($_POST['data_final'])) ? $_POST['data_final'] : '',
		'hora_final'	=>(isset($_POST['hora_final'])) ? $_POST['hora_final'] : '',
		'concluido'		=>(isset($_POST['concluido'])) ? $_POST['concluido'] : '',
	
	);

	include "template.php";