<?php
require_once('inc/conexao.php');

if (isset($_SESSION['id_user']) && $_SESSION['adm'] == 1) {

$id_user = $_POST['id_user'];
$email = $_POST['email'];
$user = $_POST['user'];
$senha = $_POST['senha'];
$admin = $_POST['adm'];

$sql = "UPDATE usuarios SET  id_user='$id_user', email='$email', user='$user', senha='$senha', admin='$admin' WHERE id_user='$id_user'";

$result = mysqli_query($conexao,$sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['msg'] = 
        '<br>
        <div class="alert alert-success alert-dismissible fade show animated bounceInDown">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Usuário editado com sucesso!</strong>
        </div>';
       header("Location: paineladm_listagem.php");
    }
    else{
        $_SESSION['msg'] = 
        '<br>
        <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erro ao editar usuário!</strong> Verifique os dados!
        </div>';
    	header("Location: paineladm_listagem.php");
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