<?php
	include "menu.php";
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
	include "conexao.php";

	$tabela = $_POST['tabela'];
	foreach($tabela as $value){
		switch ($value) {
			case 'funcionario':

				$cpf = $_POST['cpf'];
				$nome = $_POST['nome'];
				$dt_nasc = $_POST['dtNacimento'];
				$rg = $_POST['rg'];
				$sexo = $_POST['sexo'];

				if(isset($_FILES['foto'])){
					$extencao = strtolower(substr($_FILES['foto']['name'], -4));

				//	$novo_nome = md5(time(). $extencao);

					$novo_nome = (time(). $extencao);

					$diretorio = "imagens/";

					move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome) or die ("Erro ao mover a imagem!".mysql_error());
					}else{
						echo "Error ao mover <br>";
					}

				$query = "UPDATE funcionario SET nome = '$nome', dt_nasc = '$dt_nasc', rg = '$rg',
				foto = '$novo_nome', sexo = '$sexo' WHERE cpf = '$cpf' ";

				mysqli_query($conexao, $query) or die ("Error ao fazer alteração nos dados!".mysqli_error($conexao));

				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";
				break;
			case 'endereco':

				$cpf = $_POST['cpf'];
				$estado = $_POST['estado'];
				$cidade = $_POST['cidade'];
				$bairro = $_POST['bairro'];
				$rua = $_POST['rua'];
				$numero = $_POST['numero'];
				$complemento = $_POST['comp'];

				$query = "UPDATE endereco SET uf = '$estado', cidade = '$cidade', bairro = '$bairro',
				rua = '$rua', numero = '$numero', complemento = '$complemento' 
				WHERE cpf_funcionario = '$cpf' ";

				mysqli_query($conexao, $query) or die ("Error ao fazer alteração nos dados!".mysqli_error($conexao));

				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";
				break;
			case 'salario':

				$idCargo = $_POST['id'];
				$salario = $_POST['salario'];
				$horaEx = $_POST['horaEx'];
				$va = $_POST['va'];
				$vr = $_POST['vr'];
				$vaD = $_POST['vaD'];
				$vrD = $_POST['vrD'];
				$inss = $_POST['inss'];
				$fgts = $_POST['fgts'];

				$query = "UPDATE salario_remuneracao_desconto SET salario = '$salario', horas_extra = '$horaEx', va = '$va', vr = '$vr', va_desconto = '$vaD', vr_desconto = '$vrD', inss_desconto = '$inss', fgts = '$fgts' WHERE id_cargo = '$idCargo' ";

				mysqli_query($conexao, $query) or die ("Error ao fazer alteração nos dados!".mysqli_error($conexao));

				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coleta.php'>Sair</a>";
				echo"</nav></div>";
				
				break;
			case 'cargo':

				$idCargo = $_POST['id'];
				$cargo = $_POST['cargo'];
				$funcao = $_POST['funcao'];
				$situacao = $_POST['situacao'];

				$query = "UPDATE cargo SET cargo_funcionario = '$cargo', funcao = '$funcao',
				situacao = '$situacao' WHERE id = '$idCargo' ";

				mysqli_query($conexao, $query) or die ("Error ao fazer alteração nos dados!".mysqli_error($conexao));
				
				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coleta.php'>Sair</a>";
				echo"</nav></div>";
				
				break;
			case 'contaBancaria':

				$cpf = $_POST['cpf'];
				$banco = $_POST['banco'];
				$agencia = $_POST['agencia'];
				$conta = $_POST['conta'];
				$digito = $_POST['digito'];

				$query = "UPDATE conta_bancaria SET banco = '$banco', agencia = '$agencia', conta = '$conta',
				digito = '$digito'WHERE cpf_funcionario = '$cpf' ";

				mysqli_query($conexao, $query) or die ("Error ao fazer alteração nos dados!".mysqli_error($conexao));

				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";

				break;
			case 'admissao':

				$cpf = $_POST['cpf'];
				$dt_entrada = $_POST['DtEntrada'];
				$hora_entrada = $_POST['HrEntrada'];
				$hora_saida = $_POST['HrSaida'];

				$query = "UPDATE admissao SET dt_entrada = '$dt_entrada', hora_entrada = '$hora_entrada',  hora_saida = '$hora_saida' WHERE cpf_funcionario = '$cpf' ";

				mysqli_query($conexao, $query) or die ("Erro ao fazer alteração no dados!");

				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";

				break;

			case 'contato':

				$cpf = $_POST['cpf'];
				$email = $_POST['email'];
				$celular = $_POST['celular'];
				$fixo = $_POST['fixo'];
				$link = $_POST['link'];
				$fac = $_POST['fac'];

				$query = "UPDATE contato SET email = '$email', celular = '$celular', fixo = '$fixo',
				linkedin = '$link', rede_social = '$fac' WHERE cpf_funcionario = '$cpf' ";

				mysqli_query($conexao, $query) or die ("Erro ao fazer alteração no dados!");
				
				echo "<div id='t'><nav>";
				echo"Alteração realizada com Sucesso!";
				echo"<a href='coletaSelecao.php'>Sair</a>";
				echo"</nav></div>";

				break;		

			default:
				# code...
				break;
		}
	}


?>