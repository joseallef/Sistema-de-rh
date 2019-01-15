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
			<input type="text" name="cargo" class="imput" title="Cargo"><br>
			<input type="text" name="funcao" class="imput" title="Função"><br>
			<input type="text" name="situacao" class="imput" title="Situação"><br>

			<!-- <input type="hidden" name="cpf" value="<?php echo $_GET['cpf'] ?>"> -->
			<input type="hidden" name="tabela[]" value="cargo">
			<input type="submit" name="" class="botao" value="Proximo">		
		</form>
		
	</div>
</body>
</html>