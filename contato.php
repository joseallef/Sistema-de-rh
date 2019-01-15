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
			<input type="text" name="email" class="imput" title="E-mail"><br>
			<input type="text" name="celular" class="imput" title="Celular"><br>
			<input type="text" name="fixo" class="imput" title="Fixo"><br>
			<input type="text" name="link" class="imput" title="Linkedin"><br>
			<input type="text" name="fac" class="imput" title="Facebook"><br>			
			<input type="hidden" name="cpf_funcionario" value="<?php echo $_GET['cpf'] ?> ">
			<input type="hidden" name="tabela[]" value="contato">
			<input type="submit" class="botao" value="Proximo">		
		</form>
		
	</div>
</body>
</html>