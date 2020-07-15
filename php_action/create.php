<?php

//sesão
session_start();

//Conexão 
require_once 'db-connect.php';

if(isset($_POST['btn-cadastrar'])):

    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)):
        
        $_SESSION['mensagem'] = "Erro ao Cadastrar !";
        header('Location: ../index.php');
        
    else:
    
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        $idade = mysqli_escape_string($connect, $_POST['idade']);

        $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade') ";

            if(mysqli_query($connect, $sql)):
        
                $_SESSION['mensagem'] = "Cadastrado com Sucesso !";
                header('Location: ../index.php?');

            else:

                $_SESSION['mensagem'] = "Erro ao Cadastrar !";
                header('Location: ../index.php?');

            endif;

    endif;

endif;


?>
