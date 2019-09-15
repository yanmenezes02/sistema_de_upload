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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>upload</title>
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_BTS . "bootstrap.min.css";?>">
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL . "style.css";?>">
    </head>
    <body>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <h1>Cadastrar Imagem</h1>
                    <form method="POST" action="<?php echo BASE_URL . 'config/processa.php'?>" enctype="multipart/form-data" class="form form-horizontal">
                        <div class="form-group">
                             <label for="enviar">Imagem</label>
                            <input type="file" name="imagem" class="form-control-file form-control-sm">
                        </div>
                        <button type="submit" class="btn btn-outline-dark mb-2 btn-sm">Enviar Imagem</button>
                    </form>
                    <button type="button"><a href="mostra.php">Mostrar imagens</a></button>
                </div>
            </div>
        </div>  
    </body>
    <script src="<?php echo JS_BTS . "bootstrap.min.js";?>"></script>
    <script src="<?php echo VENDOR_BTS . "jquery-1.9.1.min.js";?>"></script>
    <script src="<?php echo VENDOR_BTS . "popper.min.js";?>"></script>
</html>
