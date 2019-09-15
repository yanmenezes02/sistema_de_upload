<?php
session_start();
?>
<?php
    include('config/constants.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>upload</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_BTS . "bootstrap.min.css";?>">
    </head>
    <body>
        <h1>Cadastrar Imagem</h1>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        <div class="container-fluid">  
            <form method="POST" action="<?php echo BASE_URL . 'config/processa.php'?>" enctype="multipart/form-data" class="form form-horizontal">
                <label>Imagem</label>
                <input type="file" name="imagem"><br><br>
                
                <input name="enviar" type="submit" value="Cadastrar">
            </form>
        </div>  
        <a href="mostra.php">mostrar as fotos</a>
    </body>
    <script src="<?php echo JS_BTS . "bootstrap.min.js";?>"></script>
    <script src="<?php echo VENDOR_BTS . "jquery-1.9.1.min.js";?>"></script>
    <script src="<?php echo VENDOR_BTS . "popper.min.js";?>"></script>
</html>
