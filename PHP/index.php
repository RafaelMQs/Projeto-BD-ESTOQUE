<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$id = "SELECT usuario, nome_usuario, foto_perfil FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$result = $conn->query($id) or die($conn->error);

$row = mysqli_fetch_assoc($result);

$timezone = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);
$agora = $agora->format('H:i');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/index-style.css">
    <title> PagInicial </title>
</head>

<body>
    <input type="checkbox" id="check">

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

    <div class="sidebar">
        <img src="<?php echo "../FotoPerfil/" . $row['foto_perfil'] ?>" class="profile_image">
        <h4> <?php echo $row['usuario']; ?> </h4>
        <a href="pagperfil.php"> <i class="fas fa-user"> <span> Perfil </span> </i> </a>
        <a href="pagtabela.php"> <i class="fas fa-table"> <span> Tabela </span> </i> </a>
        <a href="pagvender.php"> <i class="fas fa-cart-plus"> <span> Vender </span> </i> </a>
    </div>

    <div class="container">
        <?php if ($agora < '12:00') { ?>
            <h1> Bom Dia <?php echo $row['nome_usuario']; ?> </h1>
        <?php } elseif ($agora >= '12:00' and $agora < '18:00') { ?>
            <h1> Boa Tarde <?php echo $row['nome_usuario']; ?> </h1>
        <?php } else { ?>
            <h1> Boa Noite <?php echo $row['nome_usuario']; ?> </h1>
        <?php } ?>

        <h2> Seja Bem Vindo!</h2>
        <p> Este é um site que foi desenvolvido para um projeto da aula de banco de dados, nele contem tudo que um gerenciamento de estoque precisa:
            Adicionar itens ao estoque, remove-los, edita-los e visualiza-los.
            Este gerenciamento ira facilitar e agilizar o seu processo de estocagem e até mesmo de gerenciamento do mesmo.
        </p>
        <video controls>
            <source src="#" type="video/mp4">
            Your browser does not support HTML video.
        </video>
        <p> Desenvolvido por: Rafael Martins Queiroz,&nbsp; Versão: Beta</p> 
    </div>
</body>

</html>