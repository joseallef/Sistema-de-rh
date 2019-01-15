<?php
	//	Essa será a conexão de todas as tabelas!

	$conexao = mysqli_connect("localhost", "root", "", "rh")
	or die ("Erro ao conectar com o banco!");

	mysqli_set_charset($conexao, "utf-8");

?>