<?php
require_once('inc/conexao.php');

if (isset($_SESSION['id_user'])) {

$id_user = $_SESSION['id_user'];
$id_post = $_POST['id_post'];
$id_ct = $_POST['id_cat'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['descricao'];

$sql = "UPDATE posts SET id_post='$id_post', id_cat='$id_ct', id_user='$id_user', titulo='$titulo',conteudo='$conteudo', data=NOW() WHERE id_post='$id_post'";
$result = mysqli_query($conexao,$sql);
    if(mysqli_affected_rows($conexao) > 0){
       $_SESSION['msg'] = 'Success';
       header("Location: painelposts_listagem.php?id_ct=$id_ct");
    }
    else{
    	$_SESSION['msg'] = 'Erro';
    	header("Location: painelposts_listagem.php?id_ct=$id_ct");
    }
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: ../index.php");
}



?>