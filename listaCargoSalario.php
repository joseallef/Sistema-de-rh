<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargos Salarios</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include "conexao.php" ?>
	<?php include "menu.php" ?>	
		
		<form action="" method="POST">
			<h2>Selecione o Cargo</h2><br>
			<select name="cargos">
				<?php 
				$query = "SELECT * FROM cargo ";

				$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
					mysql_errno($conexao));

				while ($resultado = mysqli_fetch_array($consulta)) {
					$id = $resultado['id'];
					$cargo_func = $resultado['cargo_funcionario'];
					$funcao = $resultado['funcao'];
					$situacao = $resultado['situacao'];

				echo "<option value='$id'>$cargo_func</option>";

				}
				echo"<input type='hidden' name='buscar' value='$cargo_func'>";
				?>
			</select><br>
	
			<input type="submit" class="botao" value="Buscar">
		</form>
		<div id="cont">
		<?php 
			
			if(isset($_POST['buscar'])){
				$id = $_POST['cargos'];

			  $query = "SELECT c.cargo_funcionario, c.funcao, c.situacao FROM cargo c 
			  INNER JOIN salario_remuneracao_desconto s ON s.id_cargo = c.id WHERE c.id = '$id' ";


				$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
				mysql_errno($conexao));
				

				 echo "<table>";
				 echo "<tr>";
				 echo "<th>Cargo</th>";
				 echo "<th>Função</th>";
				 echo "<th>Situação</th>";
				 echo "</tr>";
			
				

			while ($resultado = mysqli_fetch_array($consulta)) {

				$cargo_func = $resultado['cargo_funcionario'];
				$funcao = $resultado['funcao'];
				$situacao = $resultado['situacao'];
				if ($situacao == "A") {
					$situacao = "Ativo";
				}
				
				echo "<tr>";
				echo "<td>$cargo_func</td>";
				echo "<td>$funcao</td>";
				echo "<td>$situacao</td>";
				echo "</tr>";
				echo "</table>";

			}
			}
				if(isset($_POST['buscar'])){
				 $query = "SELECT s.salario, s.horas_extra, s.va, s.vr, s.va_desconto,
				 s.vr_desconto, s.inss_desconto, s.fgts, s.id_cargo FROM salario_remuneracao_desconto s INNER JOIN cargo c ON s.id_cargo = c.id WHERE s.id_cargo = '$id' ";						

				$consulta = mysqli_query($conexao, $query) or die ("Erro ao trazer as informações".mysql_error($conexao));

				echo "<table>";
				echo "<tr>";
				echo "<th>Salario</th>";
				echo "<th>Horas Extra</th>";
				echo "<th>VA</th>";
				echo "<th>VR</th>";
				echo "<th>VA Desconto</th>";
				echo "<th>VR Desconto</th>";
				echo "<th>INSS</th>";
				echo "<th>FGTS</th>";
				echo "</tr>";
				
			

			while ($resultado = mysqli_fetch_array($consulta)) {							

				$salario = $resultado['salario'];
				$horas_extra = $resultado['horas_extra'];
				$va = $resultado['va'];
				$vr = $resultado['vr'];
				$va_desconto = $resultado['va_desconto'];
				$vr_desconto = $resultado['vr_desconto'];
				$inss = $resultado['inss_desconto'];
				$fgts = $resultado['fgts'];	
				$vr *= 5;
				
				echo "<tr>";
				echo "<td>$salario</td>";
				echo "<td>$horas_extra</td>";
				echo "<td>$va</td>";
				echo "<td>$vr</td>";
				echo "<td>$va_desconto</td>";
				echo "<td>$vr_desconto</td>";
				echo "<td>$inss</td>";
				echo "<td>$fgts</td>";
				echo "</tr>";
				echo "</table>";
			}
			
			}

		?>
		</div>		
	
</body>
</html>