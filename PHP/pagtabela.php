<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$perfil = "SELECT usuario, nome_usuario, email_usuario, foto_perfil, senha_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$result = $conn->query($perfil) or die($conn->error);
$row = mysqli_fetch_assoc($result);

$id = "SELECT id_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$idresult = $conn->query($id) or die($conn->error);
$rowid = mysqli_fetch_assoc($idresult);

$tabela = "SELECT id_produto, nome_produto, quanti_produto, cod_produto, valor_produto, desc_produto FROM produto WHERE id_cliente = '{$rowid['id_usuario']}'";
$tabresult = $conn->query($tabela) or die($conn->error);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/pagtabela_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title> PagLogin </title>
</head>

<body>
    <input type="checkbox" id="check">
    <div class="topo">
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div class="left_area">
                <a href="index.php">
                    <h3>Gran<span>Stoque</span></h3>
                </a>
            </div>
            <div class="right_area">
                <a href="processo/logout.php" class="logout_btn"> <i class="fas fa-sign-out-alt"> <span> Logout </span> </i> </a>
            </div>
        </header>

    </div>

    <div class="sidebar">
        <img src="<?php echo "../FotoPerfil/" . $row['foto_perfil'] ?>" class="profile_image">
        <h4> <?php echo $row['usuario']; ?> </h4>
        <a href="pagperfil.php"> <i class="fas fa-user"> <span> Perfil </span> </i> </a>
        <a href="pagtabela.php"> <i class="fas fa-table"> <span> Tabela </span> </i> </a>
        <a href="pagvender.php"> <i class="fas fa-cart-plus"> <span> Vender </span> </i> </a>
    </div>

    <div class="container">
        <div class="tabela">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nome </th>
                        <th> Quantidade </th>
                        <th> Código </th>
                        <th> Valor </th>
                        <th> Descrição </th>
                        <th> Ações </th>
                    </tr>
                </thead>
                <?php while ($dado = mysqli_fetch_assoc($tabresult)) { ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $dado["id_produto"]; ?> </td>
                            <td> <?php echo $dado["nome_produto"]; ?> </td>
                            <td> <?php echo $dado["quanti_produto"]; ?> </td>
                            <td> <?php echo $dado["cod_produto"]; ?> </td>
                            <td> R$<?php echo $dado["valor_produto"]; ?> </td>
                            <td> <?php echo $dado["desc_produto"]; ?> </td>
                            <td> AÇÔES</td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>

        <div class="linha"></div>

        <div class="AreaBtn">
            <h1> Ações </h1>
            <?php
            if (isset($_SESSION['msgR'])) {
            ?> <div class="msgRuim"> <?php echo $_SESSION['msgR']; ?> </div> <?php
            unset($_SESSION['msgR']);
            } else if (isset($_SESSION['msgB'])) {
            ?> <div class="msgBoa"> <?php echo $_SESSION['msgB']; ?> </div> <?php
            unset($_SESSION['msgB']);
            }?>
            <input type="button" value="Cadastrar" id="cadastrar" onclick="OnModal()">
            <input type="button" value="Editar" id="editar" onclick="OnModalE()">
            <input type="button" value="Deletar" onclick="OnModalD()">
        </div>

    </div>

    <!-- AREA MODAL -->
    <div id="modal" hidden>
        <div class="content">
            <header>
                <h1 id="titulo"> Cadastrar </h1>
                <i class="fas fa-times" id="close" onclick="OffModal()"> </i>
            </header>

            <footer>
                <form action="processo/cadastrar.php" method="POST">
                    <input type="text" placeholder="ID" name="id" hidden id="id">
                    <input type="text" placeholder="NOME" name="nome">
                    <input type="text" placeholder="QUANTIDADE" name="quant" id="quant">
                    <input type="text" placeholder="CODIGO" name="cod">
                    <input type="text" placeholder="VALOR" name="valor" id="valor">
                    <input type="text" placeholder="DESCRIÇÃO" name="desc" id="desc">
                    <input type="submit" value="Cadastrar" id="botao" name="opcao">
                </form>
            </footer>
        </div>
    </div>


    <script src="../JS/js_tabela.js"></script>
</body>

</html>