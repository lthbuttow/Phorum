<?php

	$servidor='localhost';
	$user='root';
	$pass='';
	$dbname='phorum';
	$conexao=mysqli_connect($servidor, $user, $pass, $dbname) or die ("Não foi possível conectar ao servidor do banco de dados.");
?>