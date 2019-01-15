<?php 
	include "conexao.php";

	include "menu.php";

		echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

		echo "<div id='cont'>";

	$CPF = $_POST['cpf'];

	if(!empty($CPF)){

		$query = "SELECT * FROM funcionario WHERE cpf = '$CPF' ";

		$consulta = mysqli_query($conexao, $query) or die
		("Erro ao trazer as informações".mysql_error($conexao));

			echo "<table>";
			echo "<tr>";
			echo "<th>CPF</th>";
			echo "<th>Nome</th>";
			echo "<th>Dt Nascimento</th>";
			echo "<th>RG</th>";
			echo "<th>Sexo</th>";
			echo "<th>Situação</th>";
			echo "<th>Foto</th>";
			echo "</tr>";

		while ($resultado = mysqli_fetch_array($consulta)) {

			$cpf = $resultado['cpf'];
			$nome = $resultado['nome'];
			$dt_nasc = $resultado['dt_nasc'];
			$rg = $resultado['rg'];
			$sexo = $resultado['sexo'];
			$situ = $resultado['situacao'];
			$foto = $resultado['foto'];

			if($situ == 'I'){
				$situ = 'Desligado';
			}else{
				$situ = 'Ativo';
			}

			echo "<tr>";
			echo "<td>$cpf</td>";
			echo "<td>$nome</td>";
			echo "<td>$dt_nasc</td>";
			echo "<td>$rg</td>";
		   	echo "<td>$sexo</td>";
		   	echo "<td>$situ</td>";
		   	echo "<td><img src='imagens/$foto' width='80' height='60' /></td>";
			echo "</tr>";
			echo "</table>";
		}

			$query = "SELECT e.uf, e.cidade, e.bairro, e.rua, e.numero, e.complemento FROM endereco e INNER JOIN funcionario f ON e.cpf_funcionario = f.cpf
							 WHERE cpf = '$CPF' ";
			$consulta = mysqli_query($conexao, $query);
			
			echo "<table>";
			echo "<tr>";
			echo "<th>UF</th>";
			echo "<th>Cidade</th>";
			echo "<th>Bairro</th>";
			echo "<th>Rua</th>";
			echo "<th>Numero</th>";
			echo "<th>Complemento</th>";
			echo "</tr>";
		while ($resultado = mysqli_fetch_array($consulta)) {

			$estado = $resultado['uf'];
			$cidade = $resultado['cidade'];
			$bairro = $resultado['bairro'];
			$rua = $resultado['rua'];
			$numero = $resultado['numero'];
			$compl = $resultado['complemento'];

			echo "<tr>";
			echo "<td>$estado</td>";
			echo "<td>$cidade</td>";
			echo "<td>$bairro</td>";
			echo "<td>$rua</td>";
			echo "<td>$numero</td>";
			echo "<td>$compl</td>";
			echo "</tr>";
			echo "</table>";							
									
		}				

			$query = "SELECT s.salario, s.horas_extra, s.va, s.vr, s.va_desconto,
			s.vr_desconto, s.inss_desconto, s.fgts, s.id_cargo FROM salario_remuneracao_desconto s INNER JOIN cargo c ON s.id_cargo = c.id INNER JOIN funcionario f ON f.id_cargo = c.id
			 WHERE cpf = '$CPF' ";							

			$consulta = mysqli_query($conexao, $query) or die ("Erro ao trazer as informações".mysql_error($conexao));

			echo "<table>";
			echo "<tr>";
			echo "<th>Salario</th>";
			echo "<th>Horas Extra</th>";
			echo "<th>VA</th>";
			echo "<th>VR</th>";
			echo "<th>VA Desconto</th>";
			echo "<th>VR Desconto</th>";
			echo "<th>INSS</th>";
			echo "<th>FGTS</th>";
			echo "</tr>";

		while ($resultado = mysqli_fetch_array($consulta)) {							

			$salario = $resultado['salario'];
			$horas_extra = $resultado['horas_extra'];
			$va = $resultado['va'];
			$vr = $resultado['vr'];
			$va_desconto = $resultado['va_desconto'];
			$vr_desconto = $resultado['vr_desconto'];
			$inss = $resultado['inss_desconto'];
			$fgts = $resultado['fgts'];	

			echo "<tr>";
			echo "<td>$salario</td>";
			echo "<td>$horas_extra</td>";
			echo "<td>$va</td>";
			echo "<td>$vr</td>";
			echo "<td>$va_desconto</td>";
			echo "<td>$vr_desconto</td>";
			echo "<td>$inss</td>";
			echo "<td>$fgts</td>";
			echo "</tr>";
			echo "</table>";
		}

			$query = "SELECT c.cargo_funcionario, c.funcao, c.situacao FROM cargo c 
			INNER JOIN funcionario f ON f.id_cargo = c.id WHERE cpf = '$CPF' ";

			$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
			mysql_errno($conexao));

			echo "<table>";
			echo "<tr>";
			echo "<th>Cargo</th>";
			echo "<th>Função</th>";
			echo "<th>Situação</th>";
			echo "</tr>";

		while ($resultado = mysqli_fetch_array($consulta)) {

			$cargo_func = $resultado['cargo_funcionario'];
			$funcao = $resultado['funcao'];
			$situacao = $resultado['situacao'];

			echo "<tr>";
			echo "<td>$cargo_func</td>";
			echo "<td>$funcao</td>";
			echo "<td>$situacao</td>";
			echo "</tr>";
			echo "</table>";

		}

			$query = "SELECT c.email, c.celular, c.fixo, c.linkedin, c.rede_social FROM contato c INNER JOIN funcionario f ON f.cpf = c.cpf_funcionario	WHERE  cpf = '$CPF' ";

			$consulta = mysqli_query($conexao, $query) or die ("Error ao busca os dados!".
			mysqli_error($conexao));

			echo "<table>";
			echo "<tr>";
			echo "<th>E-mail</th>";
			echo "<th>Celular</th>";
			echo "<th>Fixo</th>";
			echo "<th>Linkedin</th>";
			echo "<th>Facebook</th>";
			echo "</tr>";

		while ($resultado = mysqli_fetch_array($consulta)) {
					
			$email = $resultado['email'];
			$celular = $resultado['celular'];
			$fixo = $resultado['fixo'];
			$linkedin = $resultado['linkedin'];
			$rede_social = $resultado['rede_social'];

			echo "<tr>";
			echo "<td>$email</td>";
			echo "<td>$celular</td>";
			echo "<td>$fixo</td>";
			echo "<td>$linkedin</td>";
			echo "<td>$rede_social</td>";
			echo "</tr>";
			echo "</table>";

		}

			$query = "SELECT c.banco, c.agencia, c.conta, c.digito FROM conta_bancaria c
			INNER JOIN funcionario f ON c.cpf_funcionario = f.cpf WHERE cpf = '$CPF' ";

			$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
			mysql_error($conexao));


			echo "<table>";
			echo "<tr>";
			echo "<th>Banco</th>";
			echo "<th>Agencia</th>";
			echo "<th>Conta</th>";
			echo "<th>Digito</th>";
			echo "</tr>";

		while ($resultado = mysqli_fetch_array($consulta)) {

			$banco = $resultado['banco'];
			$agencia = $resultado['agencia'];
			$conta = $resultado['conta'];
			$conta = $resultado['digito'];

			echo "<tr>";
			echo "<td>$banco</td>";
			echo "<td>$agencia</td>";
			echo "<td>$conta</td>";
			echo "<td>$conta</td>";
			echo "</tr>";
			echo "</table>";

		}
		
	}else{

		$sem = "informe";
		header ("location: alerta.php?informa=".$sem);
		
	}
	echo "</div>";

?>