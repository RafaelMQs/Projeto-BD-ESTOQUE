<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$id = "SELECT usuario, nome_usuario, email_usuario, foto_perfil, senha_usuario FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$result = $conn->query($id) or die($conn->error);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfil-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title> PagLogin </title>
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
        <h1> Dados do Cadastro: </h1>
        <div class="foto_perfil">
            <h3> Foto Perfil: </h3>
            <img src="<?php echo "../FotoPerfil/" . $row['foto_perfil'] ?>" class="profile_image" alt="perfil">
            <figcaption>Tamanho max: 200px(Altura) x 200px(Largura)</figcaption>
        </div>
        <div class="form">
            <?php
            if (isset($_SESSION['msg'])) :
                echo $_SESSION['msg'];
            endif;
            unset($_SESSION['msg']);
            ?>
            <!-- FIM - Atualizado com sucesso -->
            <form action="processo/up_perfil.php" method="POST" class="perfil_form" enctype="multipart/form-data">
                <label for="usuario"> Usuario: </label>
                <input type="text" id="usuario" name="usuario" value="<?php echo $row['usuario'] ?>" class="disabled" disabled>
                <span class="input-border"></span>

                <label for="nome"> Nome: </label>
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome_usuario'] ?>" class="disabled" disabled>
                <span class="input-border"></span>

                <label for="email"> Email: </label>
                <input type="email" id="email" name="email" value="<?php echo $row['email_usuario'] ?>" class="disabled" disabled>
                <span class="input-border"></span>

                <label for="senha"> Senha: </label>
                <input type="password" id="senha" name="senha" value="<?php echo $row['senha_usuario'] ?>" class="disabled" disabled>
                <span class="input-border"></span>

                <label for="arquivo"> Foto de perfil: </label>
                <input type="file" name="arquivo" id="arquivo" placeholder="TROCAR IMAGEM" class="disabled" disabled>

                <input type="button" value="Editar" id="editar">
                <input type="submit" value="Atualizar" id="atualizar" hidden>
                <p> Não podera atualizar o Email. </p>
        </div>
    </div>


    <script src="../JS/js_perfil.js"></script>
</body>

</html>