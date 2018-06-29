<?php
require_once('inc/cabecalho.php');

if (isset($_SESSION['id_user'])) {


$sql = 'SELECT DISTINCT user,categorias.id_cat,categoria FROM posts,usuarios,categorias WHERE posts.id_user=usuarios.id_user AND posts.id_cat=categorias.id_cat AND usuarios.id_user='.$_SESSION['id_user'];

$result = mysqli_query($conexao, $sql);
$result_array = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

    <!-- Page Content -->
    <div class="container">
          <br>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item "><a href="posts.php">Posts</a></li>
            <li class="breadcrumb-item active">Painel Usuário - Categorias</li>
          </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
 
          <h1 class="my-4">Painel do Usuário  
            <small>Categorias</small>
          </h1>
          <?php
          foreach($result as $categorias){
            $html = '
              <a type="button" class="btn btn-primary btn-block" href="painelposts_listagem.php?id_ct='.$categorias['id_cat'].'">'.$categorias['categoria'].'</a>
            ';
            echo $html;
          }
          ?>
          <!-- Pagination -->

        </div>


        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
        <?php 
        require_once('inc/banners.php');
        ?>          

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Opções do Usuário</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <p>Escolha uma das categorias</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<?php
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
require_once('inc/rodape.php');
