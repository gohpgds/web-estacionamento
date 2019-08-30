<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM estaciona";
	$resultado = $conexao->query($sql);

	$Estacionados = $resultado->fetchAll();

	/*[
		[
			'cpf'=>'04080660608',
			'nome'=>'Livão',
			'dtNasc'=>'28/11/00'
		],
		[
			'cpf'=>'15107352604',
			'nome'=>'Livinha',
			'dtNasc'=>'14/01/02'
		]
	];*/
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Estacionados - IF Park</title>
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
			<h2>Carros Estacionados</h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Cód.</th>
							<th>Pátio</th>
							<th>Placa</th>
							<th>Entrada</th>
							<th>Saída</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($Estacionados as $estaciona): ?>
						<tr>
							<td><?= $estaciona['cod'] ?></td>
							<td><?= $estaciona['patio_num'] ?></td>
							<td><?= $estaciona['veiculo_placa'] ?></td>
							<td><?= $estaciona['dtentrada'] . ' ' . $estaciona['hsentrada'] ?></td>
							<td><?= $estaciona['dtsaida'] . ' ' . $estaciona['hssaida'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

</body>
</html>