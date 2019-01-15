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
	<div class="tudo">

	<?php include "menu.php"?>

		<form action="mostrarDados.php" method="POST">
			Quais dados deseja buscar?<br>

			<select name='opcoes' id='opcoes'>
				<option value='T'>Todos</option>
				<option value='S'>Selecionar</option>
			</select>

			<div class="todos">
				<fieldset>
					Dados Principais:
					<input type="checkbox" name="mark[]" checked="" value="funcionario">
					Endereço:
					<input type="checkbox" name="mark[]" checked="" value="endereco"><br>
					Salario:
					<input type="checkbox" name="mark[]" checked="" value="salario">
					Cargo:
					<input type="checkbox" name="mark[]" checked="" value="cargo">
					Contato:
					<input type="checkbox" name="mark[]" checked="" value="contato"><br>
					Conta Bancaria:
					<input type="checkbox" name="mark[]" checked="" value="contaBancaria">
					Admissao:
					<input type="checkbox" name="mark[]" checked="" value="admissao">
				</fieldset>
			</div>
			<div class="selecionar">
				<fieldset>
					Dados Principais:
					<input type="checkbox" name="mark[]" value="funcionario">
					Endereço:
					<input type="checkbox" name="mark[]" value="endereco"><br>
					Salario:
					<input type="checkbox" name="mark[]" value="salario">
					Cargo:
					<input type="checkbox" name="mark[]" value="cargo">
					Contato:
					<input type="checkbox" name="mark[]" value="contato"><br>
					Conta Bancaria:
					<input type="checkbox" name="mark[]" value="contaBancaria">
					Admissao:
					<input type="checkbox" name="mark[]" value="admissao">

				</fieldset>
			</div>
			Informe o Cpf<br>
			<input type="text" name="cpf">
			<input type="hidden" name="acao" value="enviar">
			<input type="submit" name="" class="botao" value="Buscar">
		</form>
		
	</div>
	
</body>
</html>