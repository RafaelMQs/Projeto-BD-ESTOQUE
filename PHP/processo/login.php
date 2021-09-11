<?php
session_start();
include('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha']) ){
    $_SESSION['vazio'] = true;
    header('Location: ../paglogin.php');
    exit();
}


$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT usuario, nome_usuario FROM logins WHERE email_usuario = '{$email}' and senha_usuario = '{$senha}'";

$result = mysqli_query($conn, $query);


$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $email;
    header('Location: ../index.php');
}else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: ../paglogin.php');
    exit();
}