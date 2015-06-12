<?php

$conexao = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if (mysqli_connect_errno($conexao)){
	echo "Ocorreu um problema ao conectar ao banco";
	die();
}
function buscar_chamados($conexao) {
    $sqlBusca = 'SELECT * FROM chamados';
    $resultado = mysqli_query($conexao, $sqlBusca);
    $chamados = array();
    while ($chamado = mysqli_fetch_assoc($resultado)) {
        $chamados[] = $chamado;
    }
    return $chamados;

}

function gravar_chamado($conexao, $chamado) {
    $sqlGravar = $query = "INSERT INTO chamados (evento, local, posicao, solicitante, data_inicio, hora_inicio, descricao,
                                prioridade, data_final, hora_final, concluido)
          VALUES ('{$chamado['evento']}', '{$chamado['local']}', '{$chamado['posicao']}', '{$chamado['solicitante']}',
                  '{$chamado['data_inicio']}', '{$chamado['hora_inicio']}', '{$chamado['descricao']}',
                  '{$chamado['prioridade']}', '{$chamado['data_final']}', '{$chamado['hora_final']}',
                  '{$chamado['concluido']}')";

   mysqli_query($conexao, $sqlGravar);
}

function buscar_tarefa($conexao, $id){
    $sqlBusca = 'SELECT * FROM chamados WHERE id= '. $id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
    var_dump(mysqli_bind_result($resultado));
    mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $chamado){
    $sqlEditar = "UPDATE chamados SET
            evento ='{$chamado['evento']}',
            local ='{$chamado['local']}',
            posicao = '{$chamado['posicao']}',
            solicitante = '{$chamado['solicitante']}',
            data_inicio = '{$chamado['data_inicio']}',
            hora_inicio = '{$chamado['hora_inicio']}',
            descricao = '{$chamado['descricao']}',
            prioridade = '{$chamado['prioridade']}',
            data_final = '{$chamado['data_final']}',
            hora_final = '{$chamado['hora_final']}',
            concluido = '{$chamado['concluido']}'
         WHERE id = {$chamado['id']}
    ";
    mysqli_query($conexao, $sqlEditar);
}
function remover_tarefa($conexao, $id){
    $sqlRemover = "DELETE FROM chamados WHERE id={$id}";
    if (mysqli_query($conexao, $sqlRemover)){
        echo "gravado com sucesso";
    } else {
        echo "erro"; 
    }
}
function gravar_anexo($conexao, $anexo){
    $sqlGravar = "INSERT INTO anexos
        (id_chamado, nome, arquivo) 
        VALUES (
            {$anexo['id_chamado']},
            '{$anexo['nome']}',
            '{$anexo['arquivo']}'
        )
    ";
    if (mysqli_query($conexao, $sqlGravar)){
        echo "gravado com sucesso";
    } else {
        echo "erro"; 
    }
}
function buscar_anexos($conexao, $id_chamado){
    $sqlBusca = "SELECT * FROM anexos WHERE id_chamado={$id_chamado}";
    $resultado = mysqli_query($conexao, $sqlBusca);
    $anexos = array();
    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }
    return $anexos;
}
function remover_anexo($conexao, $id_chamado){
    $sqlRemover = "DELETE FROM anexos WHERE id={$id_chamado}";
    mysqli_query($conexao, $sqlRemover);
}