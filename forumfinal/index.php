<?php
require_once('inc/conexao.php');
if (isset($_SESSION['id_user'])) {
  $id_user =$_SESSION['id_user'];
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

  </head>

  <body>
    <div class="container">  
    <?php
      if (isset($_SESSION['msg'])) {
       echo $_SESSION['msg'];
       unset($_SESSION['msg']);
      }
      ?>
    </div>
      <?php  
      if (!isset($_SESSION['user']) || !isset($_SESSION['senha'])){
        ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand animated flip" href="index.php">Phorum</a>
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
              <a class="navbar-brand bounce" href="index.php">Phorum</a>
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
                  <?php
                  $html = '
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="paineluser.php?id_user='.$id_user.'">Painel</a>
                  </li>';
                  echo $html;
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="contato.php">Contato</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="openModal" href="logout.php">Logout</a>
                  </li>

		           <li class="nav-item">
		             <a class="nav-link" href="lucas/painelposts_categorias.php">Painel Postagem</a>
		           </li> 
		           <li class="nav-item">
		             <a class="nav-link" href="paineluser.php">Painel Usuário</a>
		           </li> 
                </ul>
              </div>
            </div>
          </nav>
        <?php
      }
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4 animated rubberBand">
        <h1 class="display-3">Bem-vindo ao Phorum!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>

      </header>

      <!-- Page Features -->
      <div class="row text-center">
      <?php
      $sql = 'SELECT * FROM categorias ORDER BY categoria ASC';
      $result = mysqli_query($conexao, $sql);
      $result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);
       
      foreach ($result_array as $cats) {
        $html = '
        <div class="col-lg-3 col-md-6 mb-4 animated rubberBand">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">'.$cats['categoria'].'</h4>
            </div>
            <div class="card-footer">
              <a href="lucas/posts.php?idcat='.$cats['id_cat'].'" class="btn btn-primary">Postagens!</a>
            </div>
          </div>
        </div>';
        echo $html;
       } 
      ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

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