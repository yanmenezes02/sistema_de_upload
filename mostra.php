<?php
	include('conexao.php');

	$pdo = conectar();

	$seleciona = $pdo->prepare('SELECT * FROM usuarios');
	$seleciona->execute();
	$mostra = $seleciona->fetch(PDO::FETCH_ASSOC);

		
?>

	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mostrar as fotos</title>
</head>
<body>
	<?php do{ ?>
		<img src="imagens/<?php echo $mostra['imagem'];?>" alt=""> 
	<?php } while($mostra = $seleciona->fetch(PDO::FETCH_ASSOC));?>
</body>
</html>