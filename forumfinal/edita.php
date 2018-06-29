<?php
require_once('inc/conexao.php');

if (isset($_SESSION['id_user'])) {

$id_user = $_SESSION['id_user'];
$email = $_POST['email'];
$user = $_POST['user'];
$senha = $_POST['senha'];

$sql = "UPDATE usuarios SET id_user='$id_user', email='$email', user='$user', senha='$senha' WHERE id_user='$id_user'";

$result = mysqli_query($conexao,$sql);
    if(mysqli_affected_rows($conexao) > 0){
       $_SESSION['msg'] = 'Success';
       header("Location: paineluser.php?id_user=$id_user");
    }
    else{
    	$_SESSION['msg'] = 'Erro';
    	header("Location: paineluser.php?id_user=$id_user");
    }
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: index.php");
}



?>