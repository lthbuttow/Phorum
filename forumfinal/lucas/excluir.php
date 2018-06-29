<?php
require_once('inc/conexao.php');
if (isset($_SESSION['id_user'])){

	$id_post = $_GET['id_post'];
	$id_ct = $_GET['id_ct'];
	


		$sql = 'DELETE FROM posts WHERE id_post='.$id_post;
		echo $sql;
		$result = mysqli_query($conexao,$sql);
		if($result != false){
			if(mysqli_affected_rows($conexao) > 0){
				$_SESSION['msg'] = 'Success';
				header('Location: painelposts_listagem.php?id_ct='.$id_ct);
			}
		}
		else{
	       $_SESSION['msg'] = 'Erro';
	       header('Location: painelposts_listagem.php?id_ct='.$id_ct);
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

