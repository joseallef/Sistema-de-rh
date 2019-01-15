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
			<input type="text" name="banco" class="imput" title="Banco"><br>
			<input type="text" name="agencia" class="imput" title="Agencia"><br>
			<input type="text" name="conta" class="imput" title="Conta"><br>
			<input type="text" name="digito" class="imput" title="Digito"><br>

			<input type="hidden" name="cpf_funcionario" value="<?php echo $_GET['cpf'] ?>">
			<input type="hidden" name="tabela[]" value="contaBancaria">
			<input type="submit" name="" class="botao" value="Proximo">
		</form>		
	</div>
	
</body>
</html>