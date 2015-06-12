<?php
	session_start();

	if (isset($_GET['nome']) && $_GET['nome'] !='') {

		$contatos = array();

		$contatos['nome'] = $_GET['nome'];

		if (isset($_GET['telefone'])) {
			$contatos['telefone'] = $_GET['telefone'];
			} else {
				$contatos['telefone'];
			}
		if (isset($_GET['email'])){
			$contatos['email'] = $_GET['email'];
		}

		$_SESSION['contatos'][] = $contatos;
	} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contatos</title>
</head>
<body>
	<h1>Contatos</h1>
	<form action="">
		<legend>Contato</legend>
		<label for="">Nome: <input type="text" name="nome"></label>
		<label for="">Telefone: <input type="text" name="telefone"></label>
		<label for="">E-mail: <input type="text" name="email"></label>
		<label for=""><input type="submit" value="Cadastrar"></label>
	</form>
	<table>
		<tr>
			<th colspan="3">Contatos</th>
			<?php foreach ($contatos as $contato) : ?>
			<tr>
				<td><?php echo $contatos['nome']; ?></td>
				<td><?php echo $contatos['telefone']; ?></td>
				<td><?php echo $contatos['email']; ?></td>
			</tr>
		<?php endforeach; ?>

		</tr>
	</table>
	
</body>
</html>