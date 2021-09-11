<?php

$nomeservidor ="localhost";
$nomeusuario ="root";
$senha = "";
$bd ="projeto estoque";

$conn = new mysqli($nomeservidor, $nomeusuario, $senha, $bd);
if ($conn->connect_error){
    echo "Deu ruim!";
}

?>