<?php
session_start();
include("conexao.php");

$idAdd = $_POST["idAdd"];
$quantAdd = $_POST["quantAdd"];

if ($idAdd == "" || $quantAdd == "") {
    echo json_encode("VAZIO");
} else {
    $id_usu = "SELECT id_produto, quanti_produto FROM produto WHERE id_produto = '$idAdd'";
    $id_query = $conn->query($id_usu) or die($conn->error);
    $row = mysqli_fetch_assoc($id_query);

    if ($id_query) {
        $q = $row['quanti_produto'];
        $vendido = $q + $quantAdd;
        $query = "UPDATE produto SET quanti_produto = '$vendido' WHERE id_produto = '$idAdd'";
        $update_query = $conn->query($query) or die($conn->error);
        echo json_encode("quantAdd");
    } else {
        echo json_encode("erro3");
    }
}

exit;
