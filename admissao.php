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

		<form action="incluir.php" type="" method="POST">
			
			<input type="date" name="DtEntrada" class="imput" title="Data Entrada"><br>
		<!-- 	<input type="date" name="DtSaida" class="imput" title="Data de Sai"><br> -->
			<input type="text" name="HrEntrada" class="imput" title="Hórario Inicio de Entrada"><br>
			<input type="text" name="HrSaida" class="imput" title="Hórario de Saida"><br>

			<input type="hidden" name="cpf" value="<?php echo $_GET['cpf'] ?>">
			
			<input type="hidden" name="tabela[]" value="admissao">
			<input type="submit" name="" class="botao" value="Proximo">
			
		</form>
		
	</div>
	
</body>
</html>