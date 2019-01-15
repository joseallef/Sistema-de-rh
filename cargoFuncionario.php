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
		<div id="cont">
		<form action="" method="POST">
			Selecione o Cargo X Beneficios<br>
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
			</select>		
			<input type="submit" class="botao" value="Buscar">
		</form>
		<form action="funcionario.php" method="">
	
			<?php
				
				if(isset($_POST['buscar'])){
					$id = $_POST['cargos'];

				  $query = "SELECT c.cargo_funcionario, c.funcao, c.situacao FROM cargo c 
				  INNER JOIN salario_remuneracao_desconto s ON s.id_cargo = c.id WHERE c.id = '$id' ";


					$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
					mysql_errno($conexao));
				

				while ($resultado = mysqli_fetch_array($consulta)) {
					$cargo_func = $resultado['cargo_funcionario'];
					$funcao = $resultado['funcao'];
					$situacao = $resultado['situacao'];
					
					echo "Cargo:<br><input type='text' name='cargo' value='$cargo_func' readonly='readonly' >";
					echo "<br>Função<br><input type='text' name='funcao' value='$funcao' readonly>";
					echo "<br>Situação<br><input type='text' name='situacao' value='$situacao' readonly='readonly'>";
					echo "<input type='hidden' name='id' value='$id'>";

				}
				}
					if(isset($_POST['buscar'])){
					 $query = "SELECT s.salario, s.horas_extra, s.va, s.vr, s.va_desconto,
					 s.vr_desconto, s.inss_desconto, s.fgts, s.id_cargo FROM salario_remuneracao_desconto s INNER JOIN cargo c ON s.id_cargo = c.id WHERE s.id_cargo = '$id' ";						

					$consulta = mysqli_query($conexao, $query) or die ("Erro ao trazer as informações".mysql_error($conexao));

				while ($resultado = mysqli_fetch_array($consulta)) {							

					$salario = $resultado['salario'];
					$horas_extra = $resultado['horas_extra'];
					$va = $resultado['va'];
					$vr = $resultado['vr'];
					$va_desconto = $resultado['va_desconto'];
					$vr_desconto = $resultado['vr_desconto'];
					$inss = $resultado['inss_desconto'];
					$fgts = $resultado['fgts'];	

					
					echo "<br>Salario:<br><input type='text' name='salario' value='$salario' readonly='readonly'>";
					echo "<br>Hora Extra<br><input type='text' name='hExtra' value='$horas_extra' readonly='readonly'>";
					echo "<br>Vale Alimentação<br><input type='text' name='va' value='$va' readonly='readonly>";
					echo "<br>Vale Refeição<br><input type='text' name='vr' value='$vr' readonly>";
					echo "<br>Desconto VA<br><input type='text' name='vaD' value='$va_desconto' readonly>";
					echo "<br>Desconto VR<br><input type='text' name='vrD' value='$vr_desconto' readonly>";
					echo "<br>INSS<br><input type='text' name='inss' value='$inss' readonly>";
					echo "<br>FGTS<br><input type='text' name='fgts' value='$fgts' readonly>";
				

				}
				
				}
			?><br>
			<input type="submit" name="" class="botao" value="Confirmar Cargo">
		</form>
	</div>
</body>
</html>