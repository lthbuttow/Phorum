<?php 
require_once('inc/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Phorum</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="inc/logo.png" type="image/x-icon"/>

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">    

  </head>

   <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand animated bounce" href="../index.php">Phorum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
            if (isset($_SESSION['id_user']) == null) {
            $html = '
            <li class="nav-item">
              <a class="nav-link" href="../cadastro.php">Cadastrar-se</a>
            </li>
            ';
            echo $html;
            }
            else{
            $html1 = '
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="painelposts_categorias.php">Painel Postagem</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="../paineluser.php">Painel Usuário</a>
            </li>
            ';
            echo $html1;
            if ($_SESSION['adm'] == 1) {
            $html2 = '
            <li class="nav-item">
              <a class="nav-link" href="../paineladm_listagem.php">Admin</a>
            </li> ';
              echo $html2;
            }
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="../contato.php">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>