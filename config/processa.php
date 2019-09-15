<?php

    session_start();

    include_once 'conexao.php';
    
    $pdo = conectar();
    
    //Verificar se o usuário clicou no botão
    $key = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_STRING);
        
        if ($key) {
            //Receber os dados do formulário
            $nome = $_FILES['imagem']['name'];

            //Inserir no BD
            $result_img = "INSERT INTO usuarios (imagem) VALUES (:imagem)";
            $insert_msg = $pdo->prepare($result_img);
            $insert_msg->bindValue(':imagem', $nome);

            //Verificar se os dados foram inseridos com sucesso
            if ($insert_msg->execute()) {
                

                //Diretório onde o arquivo vai ser salvo
                $diretorio = 'imagens/';

                /* Este codigo abaixo é opcional, ele cria uma pasta e salva a imagem la.
                   Eu optei deixa-lo de lado pois n convém */  

                //Criar a pasta de foto, 0755 é o numero da permissão para o usuário ver o arquivo.
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
?>