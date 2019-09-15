<?php

//Credenciais de acesso ao BD
function conectar(){
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=upload", "root", "123");
	}catch(PDOException $e){
		echo "FATAL: ". $e->getMessage();
	}
	return $pdo;
}