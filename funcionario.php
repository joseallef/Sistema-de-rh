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

		<form action="incluir.php" method="POST" enctype="multipart/form-data">
			<label for="imput">
				<input type="text" required id="imput" placeholder="Nome Completo" name="nome"><br>
			</label>	
			<input type="text" required name="dtNacimento" class="imput" title="Dt Nascimento"><br>
			<input type="text" name="cpf" class="imput" title="Cpf" id="txtCodigo"><br>
			<input type="text" name="rg" class="imput" title="Rg"><br>
			<input type="file" name="foto" class="arq">
			<input type="hidden" name="id_cargo" value="<?php echo $_GET['id'] ?>">
			<fieldset>
				<legend>Sexo</legend><label for="sexoM">
				Masculino<input type="radio" name="sexo" class="radio" id="sexoM" value="M"></label>
				<label for="sexoF">Feminino
					<input type="radio" name="sexo" id="sexoF" value="F">
				</label>
			</fieldset>
			<input type="hidden" name="tabela[]" value="funcionario">
			<input type="submit" name="" class="botao" value="Avançar">
			
		</form>
		
	</div>
</body>
</html>