<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user'])) {

  $id_ct = $_POST['id_cat'];
  $id_user = $_SESSION['id_user'];
  $title = $_POST['titulo'];
  $conteudo = $_POST['descricao'];


    $sql = "INSERT INTO posts (id_cat,id_user,titulo,conteudo,data) VALUES ( '$id_ct', '$id_user', '$title', '$conteudo', NOW())";
    $result = mysqli_query($conexao , $sql);
    if(mysqli_affected_rows($conexao) > 0){
       $_SESSION['msg'] = 'Success';
       header("Location: postar.php?id_categoria=$id_ct");
    } 
    else{
       $_SESSION['msg'] = 'Erro';
       header("Location: postar.php?id_categoria=$id_ct");
    }
    
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: ../index.php");
}
?>

<?php
require_once('inc/rodape.php');
