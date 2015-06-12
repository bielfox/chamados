<?php

include "config.php";
include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if (temPost()){
    // upload dos anexos

  	$id_chamado = $_POST['id_chamado'];
  	if (! isset($_FILES['anexo']) && $_FILES['anexo']['name'] == ''){
    		$tem_erros = true;
    		$erros_validacao['anexo'] = "Você deve adicionar um arquivo para anexar";
 	 	} else {
   	 		if (tratar_anexo($_FILES['anexo'])){
            $anexo = array();
     	 			$anexo['id_chamado'] = $id_chamado;
     	 			$anexo['nome'] = $_FILES['anexo']['name'];
     	 			$anexo['arquivo'] = $_FILES['anexo']['name'];
   	 		} else {
     	 			$tem_erros = true;
     	 			$erros_validacao['anexo'] = "Você deve adicionar apenas arquivos ZIP ou PDF";
   	 		}
   	 	}
 	 	if (! $tem_erros){
 	 		gravar_anexo($conexao,$anexo);
 	 	}
 	 }
$chamado = buscar_tarefa($conexao, $_GET['id']);
$anexos = buscar_anexos($conexao, $_GET['id']);
include "template_chamado.php";
