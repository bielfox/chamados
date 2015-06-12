<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = 'ma1111';
$bdBanco = 'imply';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
if (mysqli_connect_errno($conexao)){
	echo "Ocorreu um problema ao conectar ao banco";
	die();
}

$query = "INSERT INTO chamados (evento, local, posicao, solicitante, data_inicio, hora_inicio, descricao,
                                prioridade, data_final, hora_final, concluido)
          VALUES ('{$chamado['evento']}', '{$chamado['local']}', '{$chamado['posicao']}', '{$chamado['solicitante']}',
                  '{$chamado['hora_inicio']}', '{$chamado['data_inicio']}', '{$chamado['descricao']}', '{$chamado['prioridade']}',
                  '{$chamado['hora_final']}', '{$chamado['data_final']}', '{$chamado['concluido']}')";


if(mysqli_query($conexao, $query)){
    echo "gravado com sucesso";
} else {
    echo "erro";
}


