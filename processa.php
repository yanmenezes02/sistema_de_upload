<?php

session_start();
include_once 'conexao.php';
$pdo = conectar();
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$key = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
if ($key) {
    //Receber os dados do formulário
    //$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome = $_FILES['imagem']['name'];
    //var_dump($_FILES['imagem']);
    //Inserir no BD
    $result_img = "INSERT INTO usuarios (imagem) VALUES (:imagem)";
    $insert_msg = $pdo->prepare($result_img);
    $insert_msg->bindValue(':imagem', $nome);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $pdo->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'imagens/';

        //Criar a pasta de foto, 0755 é o numero da permissão para o usuário ver o arquivo
        //mkdir($diretorio, 0755);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
            header("Location: index.php");
        }        
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index.php");
}