<?php
session_start();
include("conexao.php");

$idV = $_POST["idV"];
$quantV = $_POST["quantV"];

if ($idV == "" || $quantV == "") {
    echo json_encode("VAZIO");
} else {
    $id_usu = "SELECT id_produto, quanti_produto FROM produto WHERE id_produto = '$idV'";
    $id_query = $conn->query($id_usu) or die($conn->error);
    $row = mysqli_fetch_assoc($id_query);

    if ($id_query) {
        $q = $row['quanti_produto'];
        if($quantV <= $q){
            $vendido = $q - $quantV;
            $query = "UPDATE produto SET quanti_produto = '$vendido' WHERE id_produto = '$idV'"; 
            $update_query = $conn->query($query) or die($conn->error);
            echo json_encode($quantV);
        }else{
            echo json_encode("erro2");
        }
    }else{
        echo json_encode("erro3");
    }
}

exit;
