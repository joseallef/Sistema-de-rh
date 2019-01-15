<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cargos Salarios</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="tudo">
	<?php include "menu.php" ?>
		<form action="incluir.php" method="POST">		

				<h1>Selecione a data do periodo de ferias</h1>
				Dt Inicio:<br>
				<input type="date" name="dtInicio"><br>
				Dt Fim:<br>
				<input type="date" name="dtFim"><br>
				CPF
				<input type="text" name="cpf">
				Valor da bonificação de ferias:
				<input type="text" name="vBonificao">

				<input type="hidden" name="tabela[]" value="coletaFerias">
				<input type="submit" name="" class="botao" value="Agendar"><br>
				<a href="agendarFerias.php" class="botao">Voltar</a>
			
		</form>
	</div>
</body>
</html>