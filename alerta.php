<!DOCTYPE html>
<html>
<head>
	<title>Usúario Cadastrado Com Sucesso</title>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="shurtcut icon" type="image/png" href="img/logo.png"/>
</head>
<body>
	<?php
		$onde = $_GET['informa'];	

		switch ($onde) {
			case 'informe':
				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Verifique se vc digitol o *CPF e marcou-a pelo menos uma opção!";
				echo"<a href='coleta.php'>Sair</a>";
				echo"</nav></div>";
				break;
			case 'cadRealizado':

				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Cadastro Realizado com Sucesso!";
				echo"<a href='cargoSalarios.php'>Sair</a>";
				echo"</nav></div>";
				break;

			case 'excluido':
				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Demissão realizada com Sucesso!";
				echo"<a href='recrutamentoSelecao.php'>Sair</a>";
				echo"</nav></div>";
				break;
			case 'altSucess':
				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coleta.php'>Sair</a>";
				echo"</nav></div>";
				break;

			case 'selecione':
				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Selecione Data / horario para busca!";
				echo"<a href='treinamento.php'>Sair</a>";
				echo"</nav></div>";
				break;

			case 'altSelecao':
				include "menu.php";
				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";
				break;
			default:
				# code...
				break;
		}

	?>

	<!-- <div id="tud">
		Verifique se vc digitol o *CPF e marcou-a pelo menos uma opção!
		<a href="coleta.php">Sair</a>
	</div> -->
</body>
</html>