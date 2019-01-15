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

				<select name='opcoes' id='opcoes'>
					<option value='T'>Todos</option>
					<option value='S'>Selecionar</option>
				</select>

				<div class="todos">
					<fieldset>
						Dados Principais:
						<input type="checkbox" name="mark[]" value="funcionario">
						Endereço:
						<input type="checkbox" name="mark[]" value="endereco"><br>
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