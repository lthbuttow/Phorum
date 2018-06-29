<?php
  session_start();
  require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">

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
    <div class="container">
      <br>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">contato</li>
      </ol>
    </div> 

      <?php
      if (!isset($_SESSION['user']) || !isset($_SESSION['senha'])){
        ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="index.php">Phorum</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="cadastro.php">Cadastrar-se</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal2" href="#">Login</a>
                  </li>
                  <div class="modal" id="modal">
                    <form name="loginform" method="post" action="logando.php">
                      <h3>Faça login</h3>
                      <input type="text" name="user" placeholder="User" required>
                      <input type="password" name="senha" placeholder="Senha" required> 
                      <button type="submit" class="btn btn-secondary">Logar</button>
                    </form>
                  </div>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal3" href="contato.php">Contato</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <?php
      } else {
        ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">Phorum</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="painel.php">Painel</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="contato.php">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <?php
      }
    ?>

    <br><br>

    <center>
        <form name="singup" method="post" action="contato_enviar.php">
          <div class="col-sm-4">
            <label for="exampleInputEmail1">Digite seu email de contato</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required="email">
            <small id="emailHelp" class="form-text text-muted">Certifique-se se o email colocado é válido.</small>
          </div>
          <br>
          <div class="col-sm-4">
            <label for="exampleInputPassword1">Digite o título do assunto</label>
            <input type="text" name="titulo" class="form-control" id="exampleInputUser1" placeholder="Titulo" required="titulo">
          </div>
          <br>
          <div class="col-sm-4">
            <label for="exampleFormControlTextarea1">Escreva seu texto</label>
            <textarea class="form-control" name="conteudo" id="exampleFormControlTextarea1" rows="3" required="titulo"></textarea>
          </div>
          <br>
            <button type="submit" class="btn btn-secondary">Enviar</button>
        </form>
    </center>

    <br><br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Phorum 2018</p>
      </div>
      <!-- /.container -->
    </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script>
    var btn = document.getElementById("openModal2");
    var modal = document.getElementById("modal");
    var form = document.querySelector(".modal form");

    btn.addEventListener("click", function(){
      modal.classList.add("active");
    });

    modal.addEventListener("click", function(){
      this.classList.remove("active");
    });

    form.addEventListener("click", function(event){
      event.stopPropagation();
    });
  </script>
  </body>

</html>