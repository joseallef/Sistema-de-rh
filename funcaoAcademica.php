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
		
			Universidade:<br>
			<input type="text" name="univer"><br>
			Curso:<br>
			<input type="text" name="curso"><br>
			Nivel:<br>
			<input type="text" name="nivel"><br>

			<input type="text" name="cpf" value="<?php echo $_GET['cpf'] ?>" hidden>
			<input type="hidden" name="tabela[]" value="funcaoAcademica">
			<input type="submit" name="" class="botao" value="Proximo">

		</form>
		
	</div>
</body>
</html>