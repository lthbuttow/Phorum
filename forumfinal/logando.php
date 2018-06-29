<?php
	session_start();
	require_once('conexao.php');
?>

<!DOCTYPE html>
<html>
	<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Phorum</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

	</head>
	<body>
		<?php
			$user=$_POST['user'];
			$senha=$_POST['senha'];

			$sql=mysqli_query($conexao, "SELECT * FROM usuarios WHERE user='$user' AND senha='$senha'");
			$ress=mysqli_num_rows($sql);
			$dados=mysqli_fetch_array($sql,MYSQLI_ASSOC);
			if ($ress != 0) {
				$_SESSION['adm'] = $dados['admin'];
				$_SESSION['id_user'] = $dados['id_user'];
				$_SESSION['user']=$_POST['user'];
				$_SESSION['senha']=$_POST['senha'];
			
				$_SESSION['msg'] = 
				'<br>
				<div class="alert alert-success alert-dismissible fade show animated bounceInDown">
	  				<button type="button" class="close" data-dismiss="alert">&times;</button>
	  				<strong>Usuário logado com sucesso!</strong> Bem vindo '.$user.'!
				</div>';
				if ($_SESSION['adm'] == 0) {
					header("location:index.php");
				}
				else{
					header("location:paineladm_listagem.php");
				}

			} else {
				$_SESSION['msg'] = 
				'<br>
				<div class="alert alert-danger alert-dismissible fade show">
	  				<button type="button" class="close" data-dismiss="alert">&times;</button>
	  				<strong>Erro ao logar!</strong> Verifique seus dados e tente novamente!
				</div>';
				header("location:index.php");
			}
		?>
	</body>
</html>