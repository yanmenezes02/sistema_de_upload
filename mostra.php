<?php
	include('config/buscar.php');	
	$selecionar = selecionar();
	$seleciona = $selecionar->fetch(PDO::FETCH_ASSOC);
?>

	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mostrar as fotos</title>
</head>
<body>
	<?php do{ ?>
		<img src="imagens/<?php echo $seleciona['imagem'];?>" alt=""> 

	<?php } while($seleciona = $selecionar->fetch(PDO::FETCH_ASSOC));?>
	<a href="index.php">voltar a pagina principal</a>
</body>
</html>
