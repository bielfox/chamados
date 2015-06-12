<?php
	session_start();
	
	include "config.php";
	include "banco.php";
	 	remover_anexo($conexao, $_GET['id']);
	 	header('Location:tarefa.php?id='.$_GET['id_pagina']);
	include "template_chamado.php";