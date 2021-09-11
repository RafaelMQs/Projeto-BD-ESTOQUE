<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
</head>
</body>
<?php
session_start();
include("conexao.php");
include("verificar_login.php");

$usuario_update = $_POST['usuario'];
$nome_update = $_POST['nome'];
$senha_update = $_POST['senha'];

$select = "SELECT * FROM logins WHERE email_usuario != '{$_SESSION['usuario']}'";
$resulta = $conn->query($select) or die($conn->error);

while ($dado = $resulta->fetch_array()) {

    if ($usuario_update == $dado['usuario']) {
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pagperfil.php'>
        <script type=\"text/javascript\">
            alert(\"Usuario Existente\");
        </script>
    ";
        exit();
    } else {
        $update = "UPDATE logins SET usuario = '$usuario_update', nome_usuario = '$nome_update', senha_usuario = '$senha_update' WHERE email_usuario = '{$_SESSION['usuario']}'";
        $result = $conn->query($update) or die($conn->error);
        $_SESSION['msg'] = "<h5> Atualizado com sucesso </h5>";
        header("Location: ../pagperfil.php");
    break;  
    }
}


$arquivo     = $_FILES['arquivo']['name'];

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../../FotoPerfil/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb

//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

//Renomeiar
$_UP['renomeia'] = false;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao1 = explode('.', $_FILES['arquivo']['name']);
$extensao = strtolower(end($extensao1));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pagperfil.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
				";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pagperfil.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else {
    //Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
        //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = time() . '.jpg';
    } else {
        //mantem o nome original do arquivo
        $nome_final = $_FILES['arquivo']['name'];
    }
    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        //Upload efetuado com sucesso, exibe a mensagem
        $query = mysqli_query($conn, "UPDATE logins SET foto_perfil = ('$nome_final') WHERE email_usuario = '{$_SESSION['usuario']}'");
        header("Location: ../pagperfil.php?sucesso");
    }else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../pagperfil.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
    }
}

?>

</body>

</html>

<?php


?>