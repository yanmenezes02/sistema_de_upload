<?php
	include('conexao.php');

	
	function selecionar(){
		$pdo = conectar();
		
		$buscar = $pdo->prepare('SELECT * FROM usuarios');
		$buscar->execute();
		return $buscar;
	}
	
?>