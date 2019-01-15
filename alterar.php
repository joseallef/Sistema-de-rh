<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema RH</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include "menu.php"?>
	<div id="conteudo">
		<?php

			include "conexao.php";

			$CPF = $_POST['cpf'];

			if(!empty($_POST['mark']) && $CPF !="" || !empty($_POST['mark']) && $_POST['cargos'] != ""){

				$campo = $_POST['mark'];
				foreach ($campo as $value) {
					
					switch ($value) {

						case 'funcionario':

							$query = "SELECT * FROM funcionario WHERE cpf = '$CPF' ";

							$consulta = mysqli_query($conexao, $query) or die
							("Erro ao trazer as informações".mysql_error($conexao));

							while ($resultado = mysqli_fetch_array($consulta)) {
								$cpf = $resultado['cpf'];
								$nome = $resultado['nome'];
								$dt_nasc = $resultado['dt_nasc'];
								$rg = $resultado['rg'];
								$sexo = $resultado['sexo'];
								$foto = $resultado['foto'];
						
							echo "<form action='update.php' method='POST' enctype='multipart/form-data' >";
							echo "Nome:<br><input type='text' name='nome' value='$nome'> <br>";
							echo "Dt Nascimento:<br>
								<input type='text' name='dtNacimento' value=$dt_nasc><br>
								Cpf:<br><input type='text' name='cpf' value='$cpf'><br>
								Rg:<br>
								<input type='text' name='rg' value='$rg'><br>
								Foto:<br>
								<input type='file' name='foto' value='$foto'>
								<fieldset>
									<legend>Sexo</legend>
									Masculino
									<input type='radio' name='sexo' id='sexoM' value='M'
									value='$sexo' class='fort'>Feminino
									<input type='radio' name='sexo' id='sexoF' value='F' class='fort'>
								</fieldset>
								<input type='hidden' name='cpf' value='$cpf'>
								<input type='hidden' name='tabela[]' value='funcionario'>
								<input type='submit' class='botao' value='Alterar'>";

							echo "</form>";
							}
							break;
						case 'endereco':

							$query = "SELECT e.uf, e.cidade, e.bairro, e.rua, e.numero, e.complemento FROM endereco e INNER JOIN funcionario f ON e.cpf_funcionario = f.cpf
							 WHERE cpf = '$CPF' ";

							$consulta = mysqli_query($conexao, $query);
							  // printf("Error: %s\n", mysqli_error($conexao));
									//    exit();

							while ($resultado = mysqli_fetch_array($consulta)) {
								
								$estado = $resultado['uf'];
								$cidade = $resultado['cidade'];
								$bairro = $resultado['bairro'];
								$rua = $resultado['rua'];
								$numero = $resultado['numero'];
								$complemento = $resultado['complemento'];								
							
								echo '<form action="update.php" type="" method="POST">';
			
								echo "
								Cidade:<br><select name='estado' value='$estado'>
									<option value=''></option>
									<option value='AC'>Acre</option>
									<option value='AM'>Amazonas</option>
									<option value='BA'>Bahia</option>
									<option value='GO'>Goias</option>
									<option value='MS'>Mato do sul</option>
									<option value='PR'>Parana</option>
									<option value='RO'>Rodonia</option>
									<option value='SC'>Santa catarina</option>
									<option value='AL'>Alagoas</option>
									<option value='CE'>Ceara</option>
									<option value='MA'>Maranhao</option>
									<option value='PA'>Paraida</option>
									<option value='RN'>Rio Grande do Norte</option>
									<option value='RS'>Rio Grande do Sul</option>
									<option value='SP'>Sao paulo</option>
									<option value='AM'>Amapa</option>
									<option value='DF'>Distrito Federal</option>
									<option value='MG'>Mimas Gerais</option>
									<option value='PE'>Pernanbuco</option>
									<option value='PA'>Para</option>
									<option value='RJ'>Rio de Janeiro</option>
									<option value='TO'>tocantins</option>
									<option value='Es'>Espirito Santo</option>
									<option value='MT'>Mato Groso</option>
									<option value='PI'>Piaui</option>
									<option value='RR'>Roraima</option>
									<option value='SE'>Sergipe</option>
								</select>

								<br>
							<input type='text' name='cidade' value='$cidade'><br>
								Bairro:<br>
								<input type='text' name='bairro' value='$bairro'><br>
								Rua:<br>
								<input type='text' name='rua' value='$rua'><br>
								Número:<br>
								<input type='text' name='numero' value='$numero'><br>
								Complemento: <br>
								<input type='text' name='comp' value='$complemento'><br>

								<input type='text' name='cpf' value='$CPF' hidden>
								<input type='hidden' name='tabela[]' value='endereco'>
								<input type='submit' class='botao' value='Alterar'>";

							echo "</form>";
							}
							
							break;
						case 'salario':

							$idCargo = $_POST['cargos'];

							$query = "SELECT s.salario, s.horas_extra, s.va, s.vr, s.va_desconto,
							s.vr_desconto, s.inss_desconto, s.fgts, s.id_cargo FROM salario_remuneracao_desconto s INNER JOIN cargo c ON s.id_cargo = c.id WHERE c.id = '$idCargo' ";							

							$consulta = mysqli_query($conexao, $query) or die ("Erro ao trazer as informações".mysql_error($conexao));

							while ($resultado = mysqli_fetch_array($consulta)) {							

								$salario = $resultado['salario'];
								$horas_extra = $resultado['horas_extra'];
								$va = $resultado['va'];
								$vr = $resultado['vr'];
								$va_desconto = $resultado['va_desconto'];
								$vr_desconto = $resultado['vr_desconto'];
								$inss = $resultado['inss_desconto'];
								$fgts = $resultado['fgts'];											
								
							echo '<form action="update.php" type="" method="POST">';			
							echo "
								Salario:<br>
								<input type='text' name='salario' value='$salario'><br>
								Hora Extra:<br>
								<input type='text'name='horaEx' value='$horas_extra'><br>
								Va:<br>
								<input type='text' name='va' value='$va'><br>
								Vr:<br>
								<input type='text' name='vr' value='$vr'><br>
								Va Desconto:<br>
								<input type='text' name='vaD' value='$va_desconto'><br>
								Vr Desconto:<br>
								<input type='text' name='vrD' value='$vr_desconto'><br>
								Inss: <br>
								<input type='text' name='inss' value='$inss'><br>
								Fgts: <br>
								<input type='text' name='fgts' value='$fgts'><br>

								<input type='text' name='id' value='$idCargo' hidden>
								<input type='hidden' name='tabela[]' value='salario'>
								<input type='submit' name='' class='botao' value='Alterar'>";

							echo "</form>";

							}
							break;

						case 'cargo':

							$idCargo = $_POST['cargos'];

							echo $idCargo;

							$query = "SELECT c.cargo_funcionario, c.funcao, c.situacao FROM cargo c 
							INNER JOIN salario_remuneracao_desconto s ON c.id = s.id_cargo
							 WHERE c.id = '$idCargo'";

							$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
							mysql_errno($conexao));

							while ($resultado = mysqli_fetch_array($consulta)) {

								$cargo_func = $resultado['cargo_funcionario'];
								$funcao = $resultado['funcao'];
								$situacao = $resultado['situacao'];
							
							echo '<form action="update.php" type="" method="POST">';
							echo"
									Cargo:<br>
									<input type='text' name='cargo' value='$cargo_func'><br>
									Função:<br>
									<input type='text' name='funcao' value='$funcao'><br>
									Situação:<br>
									<input type='text' name='situacao' value='$situacao'><br>

									<input type='text' name='id' value='$idCargo' hidden>
									<input type='hidden' name='tabela[]'' value='cargo'>
									<input type='submit' name='' class='botao' value='Alterar'>";
							echo"</form>";
							}
							break;
						case 'contato':

							$query = "SELECT c.email, c.celular, c.fixo, c.linkedin, c.rede_social FROM contato c INNER JOIN funcionario f ON f.cpf = c.cpf_funcionario
							WHERE  cpf = '$CPF' ";

							$consulta = mysqli_query($conexao, $query) or die ("Error ao busca os dados!".
							mysqli_error($conexao));

							while ($resultado = mysqli_fetch_array($consulta)) {

								$email = $resultado['email'];
								$celular = $resultado['celular'];
								$fixo = $resultado['fixo'];
								$linkedin = $resultado['linkedin'];
								$rede_social = $resultado['rede_social'];
							
							echo '<form action="update.php" type="" method="POST">';
							echo "
								E-mail:<br>
								<input type='text' name='email' value='$email'><br>
								Celular:<br>
								<input type='text' name='celular' value='$celular'><br>
								Fixo:<br>
								<input type='text' name='fixo' value='$fixo'><br>
								Linkedin:<br>
								<input type='text' name='link' value='$linkedin'><br>
								Facebook:<br>
								<input type='text' name='fac' value='$rede_social'><br>

								<input type='text' name='cpf' value='$CPF' hidden>
								<input type='hidden' name='tabela[]' value='contato'>
								<input type='submit' name='' class='botao' value='Alterar'>";
							
							echo "</form";

							}
							break;
						case 'resevista':

							$query = "SELECT * FROM funcionario WHERE cpf = '121.662.' ";

							$consulta = mysqli_query($conexao, $query) or die
							("Erro ao trazer as informações".mysql_error($conexao));

							while ($resultado = mysqli_fetch_array($consulta)) {
								$cpf = $resultado['cpf'];
								$nome = $resultado['nome'];
								$dt_nasc = $resultado['dt_nasc'];
								$rg = $resultado['rg'];
								$sexo = $resultado['sexo'];

								echo $cpf."<br>";
								echo $nome."<br>";
							echo "<input type='text' name='nome' value='$nome'>";
								echo $dt_nasc."<br>";
								echo $rg."<br>";
								echo $sexo."<br>";
							}

							break;
						case 'contaBancaria':

							$query = "SELECT c.banco, c.agencia, c.conta, c.digito FROM conta_bancaria c
							INNER JOIN funcionario f ON c.cpf_funcionario = f.cpf WHERE cpf = '$CPF' ";

							$consulta = mysqli_query($conexao, $query) or die ("Erro ao buscar os dados!".
							mysql_error($conexao));


							while ($resultado = mysqli_fetch_array($consulta)) {

								$banco = $resultado['banco'];
								$agencia = $resultado['agencia'];
								$conta = $resultado['conta'];
								$digito = $resultado['digito'];
							
							echo '<form action="update.php" type="" method="POST">';
							echo "
								Banco:<br>
								<input type='text' name='banco' value='$banco'><br>
								Agencia:<br>
								<input type='text' name='agencia' value='$agencia'><br>
								Conta:<br>
								<input type='text' name='conta' value='$conta'><br>
								Digito:<br>
								<input type='text' name='digito' value='$digito'><br>
								
								<input type='text' name='cpf' value='$CPF' hidden>
								<input type='hidden' name='tabela[]'' value='contaBancaria'>
								<input type='submit' name='' class='botao' value='Proximo'>";

							echo "</form>";

							}
							break;
						case 'admissao':

							$query = "SELECT a.dt_entrada, a.hora_entrada, a.hora_saida FROM admissao a INNER JOIN funcionario f ON a.cpf_funcionario = f.cpf
							WHERE f.cpf = '$CPF' ";

							$consulta = mysqli_query($conexao, $query) or die ("Error ao buscar os dados!");

							while ($resultado = mysqli_fetch_array($consulta)) {

								$dt_entrada = $resultado['dt_entrada'];
								$hora_entrada = $resultado['hora_entrada'];
								$hora_saida = $resultado['hora_saida'];
							
							echo '<form action="update.php" type="" method="POST">';
							echo "
								Dt Entrada:<br>
								<input type='date' name='DtEntrada' value='$dt_entrada'><br>
								Hr Entrada:<br>
								<input type='time' name='HrEntrada' value='$hora_entrada'><br>
								Hr Saida:<br>
								<input type='time' name='HrSaida' value='$hora_saida'><br>

								<input type='text' name='cpf' value='$CPF' hidden>
								<input type='hidden' name='tabela[]'' value='admissao'>
								<input type='submit' name='' class='botao' value='Proximo'>";
							
							echo "</form>";
							}
							break;
						case 'funcaoAcademica':
							echo '<form action="update.php" type="" method="POST">';
							echo '
								Universidade:<br>
								<input type="text" name="univer"><br>
								Curso:<br>
								<input type="text" name="curso"><br>
								Nivel:<br>
								<input type="text" name="nivel"><br>

								<input type="hidden" name="tabela[]" value="funcaoAcademica">
								<input type="submit" name="" class="botao" value="Proximo">';

							echo "</form>";
							break;
						
						default:
							// Chama a pagina alerta caso não tenha selecionado nemunha opção!
							echo "Nenhum dado Recebido! $CPF";
							break;
					}

				}
			}else{
				// Chama a pagina alerta caso não tenha selecionado nemunha opção!
				// echo "<div id='bod'>";
				// 	echo "<div id='tud'>
				// 		Verifique se vc digitol o *CPF e marcou-a pelo menos uma opção!
				// 		<a href='coleta.php'>Sair</a

				// 	</div>";
				// 	echo "Nenhum dado Recebido! UTI";
				$sem = "informe";
				header ("location: alerta.php?informa=".$sem);
				// echo "</div>";
			}
			
		?>
		
	</div>
	
</body>
</html>