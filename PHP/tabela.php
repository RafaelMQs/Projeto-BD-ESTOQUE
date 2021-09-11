<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$id = "SELECT id_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}' ";
$result = $conn->query($id) or die ($conn->error);  


while ($dado = $result->fetch_array()){

    $tabela = "SELECT * FROM produto WHERE id_cliente = ".$dado['id_usuario'];
    $result1 = $conn->query($tabela) or die ($conn->error);
    while ($dado1 = $result1->fetch_array()){   

        echo $dado1['id_cliente']."<br>";
        echo $dado1['id_produto']."<br>";
        echo $dado1['nome_produto']."<br>";
        echo $dado1['quanti_produto']."<br>";
        echo $dado1['cod_produto']."<br>";
        echo $dado1['valor_produto']."<br>";
        echo $dado1['desc_produto']."<br>";
    }
}
