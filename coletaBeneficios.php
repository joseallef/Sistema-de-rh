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
						<input type="checkbox" name="mark[]" value="contato">
						Conta Bancaria:
						<input type="checkbox" name="mark[]" value="contaBancaria">
					</fieldset>
				</div><br>

				<h2>Informe o CPF a ser alterado os dados</h2>
				<input type="text" name="cpf" class="imput" title="Informe o CPF a ser alterado os dados">
				<input type="hidden" name="acao" value="enviar">
				<input type="submit" name="" class="botao" value="Buscar">
			
		</form>
		
	</div>
	
</body>
</html>