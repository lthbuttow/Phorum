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
			$email=$_POST['email'];
			$titulo=$_POST['titulo'];
			$conteudo=$_POST['conteudo'];

			$sql=mysqli_query($conexao, "INSERT INTO contato(email, titulo, conteudo) VALUES('$email','$titulo','$conteudo')");

			header("location:index.php");
		?>
	</body>
</html>