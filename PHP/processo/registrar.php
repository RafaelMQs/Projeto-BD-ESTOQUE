<?php
session_start();
include('conexao.php');

if (empty($_POST['usuario_register']) || empty($_POST['senha_register']) || empty($_POST['senha_confirm']) || empty($_POST['email_register'])){
    header('Location: ../register.php');
    exit();
}

$usuario_register = mysqli_real_escape_string($conn, $_POST['usuario_register']);
$nome_register = mysqli_real_escape_string($conn, $_POST['nome_register']);
$senha_register = mysqli_real_escape_string($conn, $_POST['senha_register']);
$senha_confirm = mysqli_real_escape_string($conn, $_POST['senha_confirm']);
$email_register = mysqli_real_escape_string($conn, $_POST['email_register']);

$check = "SELECT usuario, email_usuario FROM logins";
$result = $conn->query($check) or die ($conn->error);


while ($dado = $result->fetch_array()){

    if ($usuario_register == $dado['usuario']){
        $_SESSION['usuario_existente'] = true;
        header('Location: ../register.php?Error-Usuario_existente');
        exit();
    }else if ($email_register == $dado['email_usuario']){
        $_SESSION['email_existente'] = true;
        header('Location: ../register.php?Error-email_existente');
        exit();
    }
}

if ($senha_register != $senha_confirm){
    $_SESSION['confirmacao_errada'] = true;
    header('Location: ../register.php?Error-Confirmação_de_senha_errada');
    exit();
}
else{
    $registrar = "INSERT INTO logins(usuario, nome_usuario, email_usuario, senha_usuario) VALUES ('$usuario_register', '$nome_register', '$email_register', '$senha_confirm')";
    $result = $conn->query($registrar) or die ($conn->error);
    header("Location: ../paglogin.php?sucesso");
}
