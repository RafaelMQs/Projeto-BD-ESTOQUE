<?php
session_start();
include('processo/conexao.php');
include('processo/verificar_login.php');

$id = "SELECT id_usuario, nome_usuario, foto_perfil FROM logins WHERE email_usuario = '{$_SESSION['usuario']}'";
$result = $conn->query($id) or die ($conn->error);

while ($dado = $result->fetch_array()){
    echo $dado['id_usuario'];
    echo $dado['nome_usuario'];
    
?>
    <img src="<?php echo "../FotoPerfil/".$dado['foto_perfil']?>">
    <a href="processo/logout.php"> SAIR </a>
    <a href="tabela.php"> TABELA </a>

    <form method="POST" action="processo/proc_upload.php" enctype="multipart/form-data">
        <input type="file" name="arquivo" placeholder="TROCAR IMAGEM">
        <input type="submit" value="ENVIAR">
    </form>

<?php
}
?>

<!-- <h2> Olá, <#?php echo $_SESSION['usuario']; ?> </h2> -->



