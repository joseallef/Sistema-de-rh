<div class="fundo">
	<img src="img/fundo3.jpg">
</div>

<div class="top">
	<img src="img/logo.png" alt="Logo">
	<span>
		<?php 
			date_default_timezone_set('America/Sao_Paulo');
			$data = date("d/m/Y");
			$hora = date("H:i:s");
			echo "Data:   ".$data."<br>";
			echo "Horas: ".$hora;
		?>
	</span>
</div>
	<div class="left">
		<ul>
		<h2>Opções</h2><hr>

			<a href="inicio.php"><img src="img/inicio.png"><li>Inicio</li></a>
			<a href="cargoSalarios.php"><img src="img/cargoSal.png"><li>Cargos e Salários</li></a>
			<a href="recrutamentoSelecao.php"><img src="img/recruta.png"><li>Recrutamento e Seleção</li></a>
			<a href="desHumano.php"><img src="img/fun.png"><li>Desenvolvimento Humano</li></a>
			<a href="beneficios.php"><img src="img/funcExt.png"><li>Benefícios</li></a>
			<a href="index.php"><img src="img/sair.png"><li>Logout</li></a>
		</ul>
</div>
