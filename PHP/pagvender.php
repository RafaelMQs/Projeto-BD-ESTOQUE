<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$perfil = "SELECT usuario, nome_usuario, email_usuario, foto_perfil, senha_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$result = $conn->query($perfil) or die($conn->error);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/pagvender_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title> PagLogin </title>
</head>

<body>
    <input type="checkbox" id="check">

    <header id="header1">
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

    <div class="sidebar">
        <img src="<?php echo "../FotoPerfil/" . $row['foto_perfil'] ?>" class="profile_image">
        <h4> <?php echo $row['usuario']; ?> </h4>
        <a href="pagperfil.php"> <i class="fas fa-user"> <span> Perfil </span> </i> </a>
        <a href="pagtabela.php"> <i class="fas fa-table"> <span> Tabela </span> </i> </a>
        <a href="pagvender.php"> <i class="fas fa-cart-plus"> <span> Vender </span> </i> </a>
    </div>

    <div class="container">
        <div class="formV">
            <header>
                <h1 id="titulo"> Vender </h1>
            </header>
            <footer>
                <form id="formV">
                    <input type="text" placeholder="ID" name="idV" id="idV"> 
                    <input type="text" placeholder="QUANTIDADE" name="quantV" id="quantV">
                    <input type="submit" value="Vender" id="botaoV" name="vender">
                </form>
            </footer>
        </div>

        <div class="formAdd">
            <header>
                <h1 id="titulo"> Adicionar </h1>
            </header>
            <footer>
                <form id="formAdd">
                    <input type="text" placeholder="ID" name="idAdd" id="idAdd">
                    <input type="text" placeholder="QUANTIDADE" name="quantAdd" id="quantAdd">
                    <input type="submit" value="Adicionar" id="botaoAdd" name="adicionar">
                </form>
            </footer>
        </div>

        <div class="linha"></div>

        <div class="padding">
            <table class="tabela">
                <thead>
                    <tr>
                        <th> ID DO ITEM VENDIDO </th>
                        <th> QUANTIDADE VENDIDA </th>
                        <th> QUANTIDADE ADICIONADA </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../JS/js_vender.js"></script>
</body>

</html>