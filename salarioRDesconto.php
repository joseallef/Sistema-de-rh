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
			<input type="text" name="salario" class="imput" title="Salario"><br>
			<input type="text" name="horaEx" class="imput" title="Hora Extra"><br>
			<input type="text" name="va" class="imput" title="Vale Transporte"><br>
			<input type="text" name="vr" class="imput" title="Vale Refeição"><br>
			<input type="text" name="vaD" class="imput" title="Desconto vale Transporte"><br>
			<input type="text" name="vrD" class="imput" title="Desconto vale Refeição"><br>
			<input type="text" name="inss" class="imput" title="Inss"><br>
			<input type="text" name="fgts" class="imput" title="Fgts"><br>
			<input type="hidden" name="idCargo" value="<?php echo $_GET['idCargo'] ?>">
			<input type="hidden" name="tabela[]" value="salarioRDesconto">
			<input type="submit" name="" class="botao" value="Proximo">
			
		</form>
		
	</div>
</body>
</html>