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
			Estado Uf:
			<select name="estado" id="es">
					<option value="AC">Acre</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="GO">Goias</option>
					<option value="MS">Mato do sul</option>
					<option value="PR">Parana</option>
					<option value="RO">Rodonia</option>
					<option value="SC">Santa catarina</option>
					<option value="AL">Alagoas</option>
					<option value="CE">Ceara</option>
					<option value="MA">Maranhao</option>
					<option value="PA">Paraida</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="SP">Sao paulo</option>
					<option value="AM">Amapa</option>
					<option value="DF">Distrito Federal</option>
					<option value="MG">Mimas Gerais</option>
					<option value="PE">Pernanbuco</option>
					<option value="PA">Para</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="TO">tocantins</option>
					<option value="Es">Espirito Santo</option>
					<option value="MT">Mato Groso</option>
					<option value="PI">Piaui</option>
					<option value="RR">Roraima</option>
					<option value="SE">Sergipe</option>
			</select>
			<input type="text" name="cidade" class="imput" title="Digite sua Cidade">
			<input type="text" name="bairro" class="imput" title="Digite seu Bairro">
			<input type="text" name="rua" class="imput" title="Digite o nome da Rua">
			<input type="text" name="numero" class="imput" title="Número">
			<input type="text" name="comp" class="imput" title="Complemento"><br>
			<input type="hidden" name="cpf_funcionario" value="<?php echo $_GET["cpf"] ?>">
			<input type="hidden" name="tabela[]" value="endereco">
			<input type="submit" name="" class="botao" value="Proximo">
		</form>
		
	</div>
</body>
</html>
