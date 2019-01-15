<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargos Salarios</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="tudo">
	<?php include "menu.php" ?>
		<div id="cont">	
			<?php 
				include "conexao.php";

				$query = "SELECT b.dt_inicio_ferias, b.dt_fim_ferias, b.bonificacao_ferias, f.cpf, f.nome FROM beneficios b INNER JOIN funcionario f
				 WHERE cpf = cpf_funcionario ";

				$resul = mysqli_query($conexao, $query) or die ("Erro ao buscar os Dados Tb ferias!");

				while ($reg = mysqli_fetch_array($resul)) {

					$dt_inicio_ferias = $reg['dt_inicio_ferias'];
					$dt_fim_ferias = $reg['dt_fim_ferias'];
					$bonificacao_ferias = $reg['bonificacao_ferias'];
					$nome = $reg['nome'];
					$cpf = $reg['cpf'];

					$dtInicio = date("d/m/Y", strtotime($dt_inicio_ferias));
					$dtFim = date("d/m/Y", strtotime($dt_fim_ferias));
					
					echo "<center><table>";
						echo "<tr>";
							echo "<th> Nome </th>";
							echo "<th> Cpf </th>";
							echo "<th>Dt Inicio</th>";
							echo "<th>Dt Fim</th>";
							echo "<th>Valor da Bonificação</th>";
						echo "</tr>";
						echo "<tr>";
							echo "<td> $nome </td>";
							echo "<td> $cpf </td>";
							echo "<td> $dtInicio </td>";
							echo "<td> $dtFim </td>";
							echo "<td> $bonificacao_ferias </td>";
						echo "</tr>";

					echo "</table></center>";

					
				}
				echo "<a href='agendarFerias' class='botao'>Voltar</a>";
			?>
			
		</div>
	</div>
</body>
</html>