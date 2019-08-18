<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>upload</title>
    </head>
    <body>
        <h1>Cadastrar Imagem</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="processa.php" enctype="multipart/form-data">
            <label>Imagem</label>
            <input type="file" name="imagem"><br><br>
            
            <input name="enviar" type="submit" value="Cadastrar">
        </form>
        <a href="mostra.php">mostrar as fotos</a>
    </body>
</html>
