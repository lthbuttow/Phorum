<?php
require_once('inc/conexao.php');
if (isset($_SESSION['id_user']) && $_SESSION['adm'] == 1){

	$id_user = $_GET['id_user'];

		$sql = 'DELETE FROM usuarios WHERE id_user='.$id_user;
		echo $sql;
		$result = mysqli_query($conexao,$sql);
		if($result != false){
			if(mysqli_affected_rows($conexao) > 0){
				$_SESSION['msg'] = '
				<br>
			    <div class="alert alert-success alert-dismissible fade show">
			        <button type="button" class="close" data-dismiss="alert">&times;</button>
			        <strong>Usuário deletado com sucesso!</strong>
			    </div>';
				header('Location:paineladm_listagem.php');
			}
		}
		else{
	       $_SESSION['msg'] = '
	       <br>
		   <div class="alert alert-danger alert-dismissible fade show">
		       <button type="button" class="close" data-dismiss="alert">&times;</button>
		       <strong>Erro ao excluir!</strong> Tente novamente!
		   </div>';
	       header('Location:paineladm_listagem.php');
		}	

} 
else{
    $_SESSION['msg'] = 
    '<br>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Acesso restrito a usuários cadastrados!</strong> Logue-se ou cadastre-se!
    </div>';
    header("Location:index.php");	
	}
?>

