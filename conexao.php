<?php

//Credenciais de acesso ao BD
function conectar(){
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=upload", "root", "");
	}catch(PDOException $e){
		echo "FATAL: ". $e->getMessage();
	}
	return $pdo;

	/*function conectar(){
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=livro","root", "");
		}catch(PDOException $e){
			echo "Conexão não foi feita corretamente: " . $e->getMessage(); 
		}
		return $pdo;
	}*/
}