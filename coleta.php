<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema RH</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="tudo">

	<?php include "menu.php"?>

		<form action="alterar.php" method="POST">
				Quais dados deseja alterar?<br>

				<select name="cargos">
					<?php 
					include "conexao.php";
					$query = "SELECT * FROM cargo ";

					$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
						mysql_errno($conexao));

					while ($resultado = mysqli_fetch_array($consulta)) {
						$id = $resultado['id'];
						$cargo_func = $resultado['cargo_funcionario'];

					echo "<option value='$id'>$cargo_func</option>";

					}
					echo"<input type='hidden' name='buscar' value='$cargo_func'>";
					?>
				</select>

				<div class="todos">
					<fieldset>
						Salario:
						<input type="checkbox" name="mark[]" value="salario">
						Cargo:
						<input type="checkbox" name="mark[]" value="cargo">
					</fieldset>
				</div>
				<input type="hidden" name="cpf" value="111">
				<input type="submit" name="" class="botao" value="Buscar">
		</form>
		
	</div>
	
</body>
</html>