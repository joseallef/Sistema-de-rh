<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema RH</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="tudo">
		<?php include "menu.php"?>

		<form action="incluir.php" type="" method="POST">			
			Nº Resevista:<br>
			<input type="text" name="">
			Dt Expedição:<br>
			<input type="text" name="">
			<input type="hidden" name="tabela[]" value="resevista">
			<input type="submit" name="" class="botao" value="Proximo">		
		</form>
		
	</div>
</body>
</html>