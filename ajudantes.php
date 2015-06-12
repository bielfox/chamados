<?php
function traduzPrioridade($codigo){
	
	$prioridade='';
	switch($codigo) {
		case 1:
			$prioridade = 'Baixa';
		break;
		case 2:
			$prioridade = 'Media';
		break;
		case 3:
			$prioridade = 'Alta';
		break;
	}
	return $prioridade;
}
function traduzConcluido($codigo){
	
	$concluido='';
	switch($codigo) {
		case 0:
			$concluido = 'Finalizado';
		break;
		case 1:
			$concluido = 'Em Aberto';
		break;
	}
	return $concluido;
}
function dataDb($data){
	if($data == '' or $data == '00/00/0000'){
		return "";
	} else {
		$dados = explode("/",$data);
		$nova_data = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
		return $nova_data;
	}
}
function exibeData($data){
	if( $data == '' or $data == '00-00-0000'){
		return "";
	} else {
		$dados = explode('-',$data);
		$nova_data = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
		return $nova_data;
	}
}
function validarData($data){
	$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
	$resultado = preg_match($padrao, $data);
	if (! $resultado){
		return false;
	}
	$dados = explode("/", $data);
	$dia = $dados[0];
	$mes = $dados[1];
	$ano = $dados[2];
	$resultado = checkdate($mes, $dia, $ano);
	return $resultado;
}
function temPost(){
	if(count($_POST)>0){
		return true;		
	}
	return false;

}
function tratar_anexo($anexo){
	$padrao= '/^.+(\.zip$|\.pdf$|\.sql$|\.rar$)$/';
	$resultado = preg_match($padrao, $anexo['name']);
	if (! $resultado){
		return false;
	}
	move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
	return true;
	
}
function enviar_email($chamado, $anexos = array()){

	include "bibliotecas/PHPMailer/PHPMailerAutoload.php";

	$corpo = preparar_corpo_email($chamado, $anexos);

	$email = new PHPMailer();

	$email->isSMTP();
	$email->Host = "smtp.gmail.com";
	$email->Port = 587;
	$email->SMTPSecure = 'tls';
	$email->SMTPAuth = true;
	$email->Username = "bielfox@gmail.com";
	$email->Password = "biel184fox";
	$email->setFrom("bielfox@gmail.com", "Avisador de Tarefas");
	$email->addAddress(EMAIL_NOTIFICACAO);
	$email->Subject = "Aviso de tarefa: {$chamado['evento']}";
	$email->msgHTML($corpo);
	
	foreach ($anexos as $anexo) {
		$email->addAttachment("anexos/{$anexo['arquivo']}");
		}
	
	$email->send();
}


function montar_email() {
    $tem_anexos = '';

    if (count($anexos) > 0) {
        $tem_anexos = "<p><strong>Atenção!</strong> Esta tarefa contém anexos!</p>";
    }

    $corpo = "
        <html>
            <head>
                <meta charset=\"utf-8\" />
                <title>Gerenciador de Tarefas</title>
                <link rel=\"stylesheet\" href=\"tarefas.css\" type=\"text/css\" />
            </head>
            <body>
                <h1>Tarefa: {$chamado['evento']}</h1>
                <p><strong>Concluída:</strong> " . traduzConcluido($chamado['concluido']) . "</p>
                <p><strong>Local:</strong>  {$chamado['local']}</p>
                <p><strong>Posição:</strong>  {$chamado['posicao']}</p>
                <p><strong>Solicitante:</strong>  {$chamado['solicitante']}</p>
                <p><strong>Data da solicitação:</strong>" . exibeData($chamado['data_inicio']) . "</p>
                <p><strong>Descrição:</strong> " . nl2br($chamado['descricao']) . "</p>
                <p><strong>Prazo:</strong> " . exibeData($chamado['prazo']) . "</p>
                <p><strong>Prioridade:</strong> " . traduzPrioridade($chamdo['prioridade']) . "</p>
                {$tem_anexos}

            </body>
        </html>
    ";
}

function preparar_corpo_email($chamado, $anexos)
{
    ob_start();
    include "template_email.php";

    $corpo = ob_get_contents();

    ob_end_clean();

    return $corpo;
}