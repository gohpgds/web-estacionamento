<?php 
	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");
	$sql = "SELECT * FROM patio";
	$resultado = $conexao->query($sql);
	$patios = $resultado->fetchAll();
	// verifico se tem mensagem pra ser exibida ao usuário.
	$mensagem = "";
	if (isset($_COOKIE['mensagem']))
	{
		$mensagem = $_COOKIE['mensagem'];
		// depois que exibo a mensagem, devo retirá-la
		// dos cookies.
		setcookie('mensagem', '', 1);
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Pátios - IF Park</title>
 	<link rel="stylesheet" href="estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li class="ativo"><a href="patio.php">Pátios</a></li>
				<li><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Pátios</h2>

			<?php if(!empty($mensagem)): ?>
				<div id="mensagem">
					<?= $mensagem; ?>
				</div>
			<?php endif; ?>

			<p><a href="cadpatio.php">Novo Pátio</a></p>

			<?php if (count($patios) == 0): ?>

				<p>Não há nenhum registro.</p>

			<?php else: ?>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Número</th>
							<th>Endereço</th>
							<th>Capacidade</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($patios as $patio): ?>
						<tr>
							<td><?= $patio['num'] ?></td>
							<td><?= $patio['ender'] ?></td>
							<td><?= $patio['capacidade'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
			<?php endif; ?>
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>