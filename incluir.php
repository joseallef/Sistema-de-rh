<?php
		
	include "conexao.php"; // Conexao com o banco de dados

	echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

	$tabela = $_POST['tabela'];
		foreach ($tabela as $value) {

			switch ($value) {
				case 'funcionario':
					// AQUI DENTRO VAI SER PROGRAMADO AS QUERYS
					// O INCLUIR DA TABELA FUNIONARIO

					$cpf =   $_POST['cpf']; //Aqui está o CPF que eu preenchi
					$nome =   $_POST['nome'];
					$dataN =    $_POST['dtNacimento'];
					$rg =   $_POST['rg'];
					$sexo =   $_POST['sexo'];
					$id = $_POST['id_cargo'];

					// $foto = $_FILES['foto']['name'];

					// $tempName = $_FILES['foto']['tmp_name'];

					// $dest = "imagens/".$foto;
					// move_uploaded_file($tempName, $dest);
					if(isset($_FILES['foto'])){
					$extencao = strtolower(substr($_FILES['foto']['name'], -4));

				//	$novo_nome = md5(time(). $extencao);

					$novo_nome = (time(). $extencao);

					$diretorio = "imagens/";

					move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome) or die ("Erro ao mover a imagem!".mysql_error());
					}else{
						echo "Error ao mover <br>";
						}	

					$query = "INSERT INTO funcionario (cpf, nome, dt_nasc, rg, sexo, foto, situacao, id_cargo)
					VALUES ('$cpf', '$nome', '$dataN', '$rg', '$sexo', '$novo_nome', 'A', '$id')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir os dados no banco!".
						mysqli_error($conexao));

					 $idContato = mysqli_insert_id($conexao);


					header("location: endereco.php?cpf=".$cpf);
				 	//Vamos jogar o cpf como parametro GET para a proxima pagina, poderia ser por POST mas o nivel de segurança não é tão alto assim para termos de ocultar dos olhos do usuario comum essa informação. Mas se vc precisasse de uma forma mais segura, seria ideal ser via POST.
					break;
				case 'endereco':
				// O INCLUIR DA TABELA ENDEREÇO
					$cpf_funcionario = $_POST['cpf_funcionario'];
					$estado = $_POST['estado'];
					$cidade = $_POST['cidade'];
					$bairro = $_POST['bairro'];
					$rua = $_POST['rua'];
					$numero = $_POST['numero'];
					$comp = $_POST['comp'];


					$query = "INSERT INTO endereco (uf, cidade, bairro, rua, numero, complemento, cpf_funcionario)
					VALUES ('$estado', '$cidade', '$bairro', '$rua', '$numero', '$comp', '$cpf_funcionario')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					$idEndereco = mysqli_insert_id($conexao);

					header("location: contato.php?cpf=".$cpf_funcionario); 
					//Exemplo. Entendeu?sim
					//Se vc precisar passar o ID do endereço para a proxima pagina, só usar o $idEndereco
					break;
				case 'contato':
				// O INCLUIR DA TABEL CONTATO E SUCESSIVAMENTE
					$cpf_funcionario = $_POST['cpf_funcionario']; //vai retornar o cpf do usuario
					$email = $_POST['email'];
					$celular = $_POST['celular'];
					$fixo = $_POST['fixo'];
					$link = $_POST['link'];
					$fac = $_POST['fac'];

					$query = "INSERT INTO contato (email, celular, fixo, linkedin, rede_social, cpf_funcionario)
					VALUES ('$email', '$celular', '$fixo', '$link', '$fac', '$cpf_funcionario')"; 

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					$idContato = mysqli_insert_id($conexao);

					header("location: admissao.php?cpf=".$cpf_funcionario);
					break;
				case 'cargo':

					$cargo = $_POST['cargo'];
					$função = $_POST['funcao'];
					$situacao = $_POST['situacao'];

					$query = "INSERT INTO cargo (cargo_funcionario, funcao, situacao)
					VALUES ('$cargo', '$função', '$situacao')";
					

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					$idCargo = mysqli_insert_id($conexao);
					echo "o valor pasado foi! ".$idCargo;
				
					header("location: salarioRDesconto.php?idCargo=".$idCargo);
					break;
				case 'contaBancaria':

					echo "Aqui ".$cpf_funcionario = $_POST['cpf_funcionario'];
					$banco = $_POST['banco'];
					$agencia = $_POST['agencia'];
					$conta = $_POST['conta'];
					$digito = $_POST['digito'];

					$query = "INSERT INTO conta_bancaria (banco, agencia, conta, digito, cpf_funcionario)
					VALUES ('$banco', '$agencia', '$conta', '$digito','$cpf_funcionario')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
					 	mysqli_error($conexao));

					$cadReaSuss = "cadRealizado";
					header ("location: alerta.php?informa=".$cadReaSuss);
					break;
				case 'salarioRDesconto':

					$idCargo = $_POST['idCargo'];
					$salario = $_POST['salario'];
					$horaEx = $_POST['horaEx'];
					$va = $_POST['va'];
					$vr = $_POST['vr'];
					$vaD = $_POST['vaD'];
					$vrD = $_POST['vrD'];
					$inss = $_POST['inss'];
					$fgts = $_POST['fgts'];

					$query = "INSERT INTO salario_remuneracao_desconto (salario, horas_extra, va, vr,
					va_desconto, vr_desconto, inss_desconto, fgts, id_cargo) VALUES ('$salario', '$horaEx',
					'$va', '$vr', '$vaD','$vrD', '$inss', '$fgts', '$idCargo')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					$cadReaSuss = "cadRealizado";
					header ("location: alerta.php?informa=".$cadReaSuss);
					break;
				case 'admissao':

					$cpf_funcionario = $_POST['cpf'];
					$DtEntrada = $_POST['DtEntrada'];
					$HrEntrada = $_POST['HrEntrada'];
					$HrSaida = $_POST['HrSaida'];

					$query = "INSERT INTO admissao (dt_entrada, hora_entrada, hora_saida, cpf_funcionario)
					VALUES ('$DtEntrada', '$HrEntrada', '$HrSaida', '$cpf_funcionario')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					header("location: contaBancaria.php?cpf=".$cpf_funcionario);

				//	header("location: funcaoAcademica.php");
					break;
				case 'funcaoAcademica':

					$cpf_funcionario = $_POST['cpf'];
					$universidade = $_POST['univer'];
					$curso = $_POST['curso'];
					$nivel = $_POST['nivel'];

					$query = "INSERT INTO funcao_academica(universidade, curso, nivel)
					VALUES ('$universidade', '$curso'. '$nivel')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));
					header("location: cargo.php?cpf=".$cpf_funcionario);
			//		header("location: resevista.php?cpf=".$cpf_funcionario);
					break;
				case 'coletaFerias':

					$dtInicio = $_POST['dtInicio'];
					$dtFim = $_POST['dtFim'];
					$vBonificao = $_POST['vBonificao'];
					$cpf = $_POST['cpf'];

					$query = "INSERT INTO beneficios (dt_inicio_ferias, dt_fim_ferias, bonificacao_ferias, cpf_funcionario) VALUES ('$dtInicio', '$dtFim', '$vBonificao', '$cpf')";

					mysqli_query($conexao, $query) or die ("Erro ao inserir dados no banco!".
						mysqli_error($conexao));

					$cadReaSuss = "cadRealizado";
					header ("location: alerta.php?informa=".$cadReaSuss);
					break;
				case 'filial':

					$cadReaSuss = "cadRealizado";
					header ("location: alerta.php?informa=".$cadReaSuss);

				//	header("location: funcaoAcademica.php");
					break;
				default:
				// Chama a pagina alerta caso não tenha selecionado nemunha opção!
					echo "Nenhum dado Recebido! $CPF".$value;
					break;
			}
		}

?>