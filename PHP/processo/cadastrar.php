<?php
session_start();
include("conexao.php");

$idProd = $_POST["id"];
$nomeProd = $_POST["nome"];
$quantProd = $_POST["quant"];
$codProd = $_POST["cod"];
$valorProd = $_POST["valor"];
$descProd  = $_POST["desc"];
$opcao = $_POST["opcao"];

$id_usu = "SELECT id_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$id_query = $conn->query($id_usu) or die($conn->error);
$row = mysqli_fetch_assoc($id_query);


if ($opcao == "Cadastrar") {
    if (empty($_POST['nome']) || empty($_POST['quant']) || empty($_POST['valor'])) {
        $_SESSION['msgR'] = "<h5> Adicione Algo Para Editar! </h5>";
        header("Location: ../pagtabela.php");
    } else {
        $cadastrar = "INSERT INTO produto (id_cliente, nome_produto, quanti_produto, cod_produto, valor_produto, desc_produto) VALUES ('{$row['id_usuario']}', '$nomeProd', '$quantProd', '$codProd', '$valorProd', '$descProd')";
        $cad_query = $conn->query($cadastrar) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Cadastrado Com Sucesoso! </h5>";
        header("Location: ../pagtabela.php");
        header("Location: ../pagtabela.php");
    }
} else if ($opcao == "Editar") {
    if (empty($_POST['id'])) {
        $_SESSION['msgR'] = "<h5> Adicione Algo Para Editar! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['cod']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $_SESSION['msgR'] = "<h5> Adicione Algo Para Editar! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant']) && empty($_POST['cod']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if (empty($_POST['nome']) && empty($_POST['cod']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET cod_produto = ('$codProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if (empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['cod']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if (empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['cod'])){
        $update = "UPDATE produto SET desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['cod']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), cod_produto = ('$codProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant']) && empty($_POST['cod']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant']) && empty($_POST['cod']) && empty($_POST['valor'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), cod_produto = ('$codProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['cod']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['cod']) && empty($_POST['valor'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET cod_produto = ('$codProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['quant']) && empty($_POST['valor'])){
        $update = "UPDATE produto SET cod_produto = ('$codProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['valor']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd'), cod_produto = ('$codProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['cod']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['cod']) && empty($_POST['valor'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['desc'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), cod_produto = ('$codProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['valor'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), cod_produto = ('$codProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome']) && empty($_POST['quant'])){
        $update = "UPDATE produto SET cod_produto = ('$codProd'), valor_produto = ('$valorProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant']) && empty($_POST['cod'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), valor_produto = ('$valorProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['desc'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd'), cod_produto = ('$codProd'), valor_produto = ('$valorProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['quant'])){
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), cod_produto = ('$codProd'), valor_produto = ('$valorProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else if(empty($_POST['nome'])){
        $update = "UPDATE produto SET quanti_produto = ('$quantProd'), cod_produto = ('$codProd'), valor_produto = ('$valorProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }else{
        $update = "UPDATE produto SET nome_produto = ('$nomeProd'), quanti_produto = ('$quantProd'), cod_produto = ('$codProd'), valor_produto = ('$valorProd'), desc_produto = ('$descProd') WHERE id_produto = ('$idProd')";
        $update_query = $conn->query($update) or die($conn->error);
        $_SESSION['msgB'] = "<h5> Editado Com Sucesso! </h5>";
        header("Location: ../pagtabela.php");
    }





} else if ($opcao == "Deletar") {
    $delete = "DELETE FROM produto WHERE id_produto = ('$idProd') OR nome_produto = ('$nomeProd') OR cod_produto = ('$codProd')";
    $delete_query = $conn->query($delete) or die($conn->error);
    $_SESSION['msgB'] = "<h5> Deletado Com Sucesso! </h5>";
    header("Location: ../pagtabela.php");
} else {
    $_SESSION['msgR'] = "<h5> Ocorreu Um Erro Na Hora De Deletar! </h5>";
}

/*  */