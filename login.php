<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 $ns = md5($sen. $_POST['senha']);

$usu = $_POST['usuario'];

$dem = "INSERT INTO usuario (usuario, senha) VALUES ('$usu', '$ns')";
//mysqli_query($conexao, $dem);

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
if($_POST['pass'] == "autentico"){
	if($row == 1) {
		$_SESSION['usuario'] = $usuario;
		header('Location: inicio.php?autentico='.$_SESSION['usuario']);
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: index.php');
		exit();
	}
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
}