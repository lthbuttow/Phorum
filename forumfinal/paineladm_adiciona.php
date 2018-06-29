<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user']) && $_SESSION['adm'] == 1) {

  $categoria = addslashes($_POST['cat']);

    $sql = "INSERT INTO categorias (categoria) VALUES ('$categoria')";
    $result = mysqli_query($conexao , $sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION['msg'] = 
        '<br>
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Nova categoria adicionada com sucesso!</strong> '.$categoria.'
        </div>';
        header("Location: paineladm_listagem.php");
    } 
    else{
        $_SESSION['msg'] = 
        '<br>
        <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erro ao cadastrar!</strong> Tente novamente!
        </div>';
        header("Location: paineladm_listagem.php");
    }
    
}
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show animated bounceInDown">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location: /index.php");
}
?>

<?php
require_once('inc/rodape.php');
