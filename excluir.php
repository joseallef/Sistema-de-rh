<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema RH</title>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<?php include "menu.php"?>
	<div id="conteudo">
		<form action="excluir.php" type="" method="POST">
			Demitir <input type="radio" name="demi" id="demitir" class="def">
			Demitidos <input type="radio" checked="" name="demi" id="demitidos" class="def">
			<?php 
				include "conexao.php";
			if(isset($_POST['boleano']) && $_POST['boleano'] === "Demitir"){
				if($_POST['cpf'] != "Informe o CPF"){

					$cpf = $_POST['cpf'];
					$motivo = $_POST['motivo'];

					$data = date("Y/m/d");

					$dem = "INSERT INTO demissao (data_demissao, motivo, cpf_funcionario) VALUES
					 ('$data', '$motivo', '$cpf')";

					$demicao = "UPDATE funcionario SET situacao = 'I' WHERE cpf = '$cpf'";
		
					mysqli_query($conexao, $dem)  or die ("Erro ao cadastrar demissão!".mysqli_error($conexao));
					mysqli_query($conexao, $demicao) or die ("Erro ao Demitir funcionario!".mysqli_error($conexao));

					$excl = "excluido";
					header("location: alerta.php?informa=".$excl);
				}else{
					$imf = "informe";
					header("location: alerta.php?informa=".$imf);
				}

			}					

			 ?>
			<div class="op1">
				<textarea rows="6" cols="70" placeholder="Motivo do desligamento" name="motivo"></textarea>
				
				<input type="text" name="cpf" class="imput" title="Informe o CPF">
				<input type="submit" name="boleano" class="botao" value="Demitir">
			</div>
			<div class="op2">
				<span>Consultar historico</span><br><br><br>
				Data inicio
				<input type="date" name="dtInicio" class="fort">Fim
				<input type="date" name="dtFim" class="fort">
				<input type="submit" name="boleano" class="botao" value="Buscar">
			</div>
		</form>
		<div class="op2">		
			<?php
				include "conexao.php";
				if(isset($_POST['boleano']) && $_POST['boleano'] === "Buscar"){

					$dtInicio = $_POST['dtInicio'];
					$dtFim = $_POST['dtFim'];

					$dtIni = date("Y/m/d", strtotime($dtInicio));
					$dtFim = date("Y/m/d", strtotime($dtFim));

					$query = "SELECT f.nome, f.foto, f.situacao, d.data_demissao, d.motivo FROM funcionario f
					INNER JOIN demissao d ON f.cpf = d.cpf_funcionario WHERE situacao = 'I' AND data_demissao 
					BETWEEN '$dtInicio' AND '$dtFim' ";
						
					$action = mysqli_query($conexao, $query) or die 
					("Erro ao trazer as informações".mysql_error($conexao));
					echo "<table>";
						echo "<tr>";
							echo "<th>Nome</th>";
							echo "<th>Situação</th>";
							echo "<th>Data da demição</th>";
							echo "<th>Motivo</th>";
							echo "<th>Foto</th>";

						echo "</tr>";

					while ($result = mysqli_fetch_array($action)) {
						$nome = $result['nome'];
						$situacao = $result['situacao'];
						$dtD = $result['data_demissao'];
						$motivo = $result['motivo'];
						$foto = $result['foto'];
						$dt = date("d/m/Y", strtotime($dtD));
						if($situacao == "I"){
							$situacao = "Desligado";
						}else{
							$situacao = "Ativo";
						}

						echo "<tr>";
							echo "<td>$nome</td>";
							echo "<td>$situacao</td>";
							echo "<td>$dt</td>";
							echo "<td>$motivo</td>";
							echo "<td><img src='imagens/$foto'></a></td>";
						echo "</tr>";
										
					}
					echo "</table>";
				}
			?>
		</div>		
	</div>
</body>
</html>