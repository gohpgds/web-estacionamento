<?php
var_dump($_POST);
if (count($_POST) > 0) {
	// um formulário foi enviado.
	// inserir no banco de dados
	$banco = "estacionamento";
	$usuario = "estacionamento";
	$senha = "joselia";
	// me conecto ao banco de dados usando o PDO
	$conexao = new PDO("mysql:host=localhost;dbname=${banco}", $usuario, $senha);
	// monto o meu comando SQL em uma string
	// Os pontos de interrogação definem lugares
	// no comando que devem ser preenchidos
	// com dados
	$sql = "INSERT INTO Modelo VALUES (?, ?)";
	// uso "prepare" para criar o comando a partir da minha string
	$comando = $conexao->prepare($sql);
	// uso "execute" para executar o comando SQL.
	// Passo os dados esperados pelo comando em um vetor (array)
	// Os dados passados seguem a ordem dos pontos de interrogação acima
	// Se o comando funcionar, "execute" retornará TRUE
	// Caso contrário, "execute" retornará FALSE
	$sucesso = $comando->execute([
		$_POST['codmod'],
		$_POST['desc_2'],
		
	]);
	// se o comando for bem sucedido, monto uma mensagem amigável
	$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Modelo cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de Pátios
	setcookie('mensagem', $mensagem);
	// redireciona para a página clientes.php
	header('Location: modelos.php');
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Novo Modelo - IF Park</title>
 	<link rel="stylesheet" href="estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patio.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
	</header>
	<div id="container">
		<main>
			<h2>Novo Modelo</h2>

			<form action="cadmodelo.php" method="post">
				<p><label for="icodmodelo">Código Modelo:</label></p>
				<p><input type="number" id="icodmodelo" name="codmod"></p>
				<p><label for="idesc">Descrição:</label></p>
				<p><input type="text" id="iender" name="desc_2"></p>
				<p><button type="submit">Salvar</button></p>
			</form>

		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>