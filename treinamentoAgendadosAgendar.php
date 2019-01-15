<?php
	
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";

	include "menu.php";
	include "conexao.php";

	if(!empty($_POST['agendar'])){
		if($_POST['data'] != "" && $_POST['hInicio'] != "" && $_POST['hFim'] !=""){
			$data = $_POST['data'];
			$hInicio = $_POST['hInicio'];
			$hFim = $_POST['hFim'];
			$cargo = $_POST['cargos'];

			$query = "INSERT INTO treinamento (data, h_inicio, h_fim)
			 VALUES ('$data', '$hInicio', '$hFim')";

			mysqli_query($conexao, $query) or die ("Erro ao inserir os dados !");

			$idTreinamento = mysqli_insert_id($conexao);

			$query = "INSERT INTO treinamento_has_cargo (id_treinamento, id_cargo) VALUES ('$idTreinamento','$cargo')";

			mysqli_query($conexao, $query) or die ("Erro ao inserir os dados !");

				echo "<div id='t'><nav>";
				echo"Cadastro Realizado com Sucesso!";
				echo"<a href='treinamento.php'>Sair</a>";
				echo"</nav></div>";;
		}else{
			echo "<div id='t'><nav>";
			echo"Selecione Data / horario para busca!";
			echo"<a href='treinamento.php'>Sair</a>";
			echo"</nav></div>";
		}

	}else
	if(!empty($_POST['agendado'])){
		if($_POST['DtInicio'] != "" && $_POST['DtFim'] != ""){	
		
			echo "<div id='cont'> ";
			$DtInicio = $_POST['DtInicio'];
			$DtFim = $_POST['DtFim'];

			$query = "SELECT t.data, t.h_inicio, t.h_fim, c.cargo_funcionario FROM treinamento t INNER JOIN treinamento_has_cargo r ON id = id_treinamento INNER JOIN cargo c ON c.id = r.id_cargo
			WHERE t.data BETWEEN '$DtInicio' AND '$DtFim' ";

			$resul = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!");
				echo "<table>";
					echo "<tr>";
						echo "<th> Setor / Cargo </th>";
						echo "<th> Data </th>";
						echo "<th> Hora Inicio </th>";
						echo "<th> Hora Fim </th>";
					echo "</tr>";
				
			while ($reg = mysqli_fetch_array($resul)) {
				
				$data = $reg['data'];
				$h_inicio = $reg['h_inicio'];
				$h_fim = $reg['h_fim'];
				$cargo = $reg['cargo_funcionario'];	

				$d = date("d/m/Y", strtotime($data));	
			
					echo "<tr>";
						echo "<td> $cargo </td>";
						echo "<td> $d </td>";
						echo "<td> $h_inicio </td>";
						echo "<td> $h_fim </td>";
					echo "</tr>";
			
			
			}
			echo "</div>";
		}else{
			echo "<div id='t'><nav>";
			echo"Selecione Data Inicio/Fim para buscar!";
			echo"<a href='treinamento.php'>Sair</a>";
			echo"</nav></div>";
	}

	}else{

		echo "<div id='t'><nav>";
		echo"Marque uma Opção para busca!";
		echo"<a href='treinamento.php'>Sair</a>";
		echo"</nav></div>";
	}


?>