<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargos Salarios</title>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="tudo">
	<?php include "menu.php" ?>
		<form action="treinamentoAgendadosAgendar.php" method="POST">
					
				<h2>Selecione qual voçê deseja</h2>
			<select name='opcoes' id='opcoes'>
				<option value='T'>Agendar</option>
				<option value='S'>Agendadas</option>
			</select>

			<div class="todos">
				<fieldset>
					Agendar:<br>
					Marque ><input type="checkbox" name="agendar"><br>
					<input type="date" class="fort" name="data"><br>
					<input type="time" class="fort" name="hInicio">
					<input type="time" class="fort" name="hFim">
					
				</fieldset>
				<h3>Selecione a área que será voltado o treinamento?</h3>
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
			</div>
			<div class="selecionar">
				<fieldset>
					Agendadas:<br><th>
					Marque ><input type="checkbox" name="agendado"><br>
					De<input type="date" class="fort" name="DtInicio">Até
					<input type="date" class="fort" name="DtFim">

				</fieldset>
			</div><br>
			<input type="hidden" name="acao" value="enviar">
			<input type="submit" name="" class="botao" value="Buscar">
			<a href="desHumano.php" class="botao">Voltar</a>			
		</form>
	</div>
</body>
</html>