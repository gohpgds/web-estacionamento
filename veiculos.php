<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM veiculo";
	$resultado = $conexao->query($sql);

	$veiculos = $resultado->fetchAll();

	$mensagem = "";
	if (isset($_COOKIE['mensagem']))
	{
		$mensagem = $_COOKIE['mensagem'];
		// depois que exibo a mensagem, devo retirá-la
		// dos cookies.
		setcookie('mensagem', '', 1);
	}
 ?>



	
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Modelos - IF Park</title>
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
			<h2>Veículos </h2>
			<?php if(!empty($mensagem)): ?>
				<div id="mensagem">
					<?= $mensagem; ?>
				</div>
			<?php endif; ?>

			<p><a href="cadveiculo.php">Novo Veículo</a></p>

			<?php if (count($veiculos) == 0): ?>

				<p>Não há nenhum registro.</p>

			<?php else: ?>
			

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Codigo Modelo</th>
							<th>Cliente</th>
							<th>Cor</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($veiculos as $veiculo): ?>
						<tr>
							<td><?= $veiculo['placa'] ?></td>
							<td><?= $veiculo['modelo_codmod'] ?></td>
							<td><?= $veiculo['cliente_cpf'] ?></td>
							<td><?= $veiculo['cor'] ?></td>


							
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
